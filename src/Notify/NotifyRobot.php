<?php
namespace Kam\Notify;

use Kam\Request\Base\{
    SendTextMsgRequest,
    SendImageMsgRequest,
    SendLinkMsgRequest,
    SendShareMiniRequest,
    SendShareMusicRequest,
    MessageForwardRequest
};
use Kam\Request\Group\{
    AgreeGroupInviteRequest,
    InviteFriendToGroupRequest,
    CreateGroupRequest,
    GroupMemberListRequest,
    GroupMemberDetailRequest,
    RemoveGroupMemberRequest,
    ModifyGroupNameRequest,
    ModifyGroupNoticeRequest,
    QuitGroupRequest,
    SendGroupAtMsgRequest
};
use Kam\Request\Friend\FriendListRequest;
use Kam\Response\CreateGroupResponse;
use Kam\Response\Group\GroupMemberResponse;
use Kam\Response\Response;

class NotifyRobot
{
    /**
     * @var NotifyData
     */
    public $notifyData;

    private static $install = [];


    public function __construct(array $data)
    {
        $this->notifyData = new NotifyData($data);
    }

    /**
     * @param array $notifyData 机器人回调POST数据
     * @return NotifyRobot
     * @throws \Exception
     */
    public static function make(array $notifyData): NotifyRobot
    {
        empty($notifyData) && $notifyData = $_POST;
        if (empty($notifyData)) {
            throw new \Exception('机器人回调参数不能为空');
        }
        $key = md5(serialize($notifyData));
        if (!isset(self::$install[$key])) {
            self::$install[$key] = new self($notifyData);
        }
        return self::$install[$key];
    }

    /**
     * 发送文字消息(好友或者群)
     * @param $message
     * @return Response
     * @throws \Exception
     */
    public function sendTextMsg($message): Response
    {
        $request = new SendTextMsgRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setToWxId($this->notifyData->getFromWxId());
        $request->setMsg($message);
        return $request->request();
    }

    /**
     * 发送群消息并艾特某人
     * @param $message
     * @return Response
     * @throws \Exception
     */
    public function sendGroupAtMsg($message): Response
    {
        $request = new SendGroupAtMsgRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setToWxId($this->notifyData->getFromWxId());
        $request->setMemberWxId($this->notifyData->getFinalFromWxId());
        $request->setMemberName($this->notifyData->getFinalFromName());
        $request->setMsg($message);
        return $request->request();
    }
    /**
     * 发送图片消息，必须是机器人服务器上面的图片
     * @param $imgUrl
     * @return Response
     * @throws \Exception
     */
    public function sendImageMsg($imgUrl): Response
    {
        $request = new SendImageMsgRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setToWxId($this->notifyData->getFromWxId());
        $request->setPath($imgUrl);
        return $request->request();
    }

    /**
     * 发送分享链接
     * @param $title
     * @param $text
     * @param $targetUrl
     * @param $picUrl
     * @return Response
     * @throws \Exception
     */
    public function sendLinkMsg($title, $text, $targetUrl, $picUrl): Response
    {
        $request = new SendLinkMsgRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setToWxId($this->notifyData->getFromWxId());
        $request->setTitle($title);
        $request->setText($text);
        $request->setPicUrl($picUrl);
        $request->setTargetUrl($targetUrl);
        return $request->request();
    }

    /**
     * 发送音乐
     * @param $name
     * @param int $type 0 随机模式 / 1 网易云音乐 / 2 酷狗音乐，默认为 0
     * @return Response
     * @throws \Exception
     */
    public function sendShareMusic($name, $type = 0)
    {
        $request = new SendShareMusicRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setToWxId($this->notifyData->getFromWxId());
        $request->setName($name);
        $request->setType($type);
        return $request->request();
    }

    /**
     * 发送小程序
     * @param $xmlContent
     * @return Response
     * @throws \Exception
     */
    public function sendShareMini($xmlContent)
    {
        $request = new SendShareMiniRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setToWxId($this->notifyData->getFromWxId());
        $request->setXmlContent($xmlContent);
        return $request->request();
    }

    /**
     * 消息转发
     * @param $msgId
     * @return Response
     * @throws \Exception
     */
    public function messageForward($msgId)
    {
        $request = new MessageForwardRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setToWxId($this->notifyData->getFromWxId());
        $request->setMsgId($msgId);
        return $request->request();
    }

    /**
     * 取群成员列表
     * @param int $isRefresh
     * @return Response
     * @throws \Exception
     */
    public function getGroupMemberList($isRefresh = 0): Response
    {
        $request = new GroupMemberListRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setGroupWxId($this->notifyData->getFromWxId());
        $request->setIsRefresh($isRefresh);
        return $request->request();
    }

    /**
     * 取群成员资料
     * @param $memberWxId
     * @param int $isRefresh
     * @return GroupMemberResponse
     * @throws \Exception
     */
    public function getGroupMember($memberWxId, $isRefresh = 0): Response
    {
        $request = new GroupMemberDetailRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setGroupWxId($this->notifyData->getFromWxId());
        $request->setMemberWxId($memberWxId);
        $request->setIsRefresh($isRefresh);
        return $request->request();
    }

    /**
     * 退出群聊
     * @return Response
     * @throws \Exception
     */
    public function quitGroup()
    {
        $request = new QuitGroupRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setGroupWxId($this->notifyData->getFromWxId());
        return $request->request();
    }

    /**
     * 创建群聊
     * @param array $friendWxIds
     * @return CreateGroupResponse
     * @throws \Exception
     */
    public function createGroup(array $friendWxIds)
    {
        $request = new CreateGroupRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setFriendWxIds($friendWxIds);
        return $request->request();
    }

    /**
     * 邀请好友加群
     * @param string $groupWxId
     * @param $friendWxId
     * @return Response
     * @throws \Exception
     */
    public function inviteFriendToGroup(string $groupWxId, $friendWxId)
    {
        $request = new InviteFriendToGroupRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setGroupWxId($groupWxId);
        $request->setFriendWxId($friendWxId);
        return $request->request();
    }

    /**
     * 移除群成员
     * @param string $groupWxId
     * @param $memberWxId
     * @return GroupMemberResponse|Response
     * @throws \Exception
     */
    public function removeGroupMember(string $groupWxId, $memberWxId)
    {
        $request = new RemoveGroupMemberRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setGroupWxId($groupWxId);
        $request->setMemberWxId($memberWxId);
        return $request->request();
    }

    /**
     * 同意群邀请
     * @return Response
     * @throws \Exception
     */
    public function agreeGroupInvite(): Response
    {
        $request = new AgreeGroupInviteRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setMsg($this->notifyData->getMsg());
        return $request->request();
    }

    /**
     * 修改群昵称
     * @param string $groupWxId
     * @param string $groupName
     * @return Response
     * @throws \Exception
     */
    public function modifyGroupName(string $groupWxId, string $groupName)
    {
        $request = new ModifyGroupNameRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setGroupWxId($groupWxId);
        $request->setGroupName($groupName);
        return $request->request();
    }

    /**
     * 修改群公告
     * @param string $groupWxId
     * @param string $groupNotice
     * @return Response
     * @throws \Exception
     */
    public function modifyGroupNotice(string $groupWxId, string $groupNotice)
    {
        $request = new ModifyGroupNoticeRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setGroupWxId($groupWxId);
        $request->setGroupNotice($groupNotice);
        return $request->request();
    }

    /**
     * 好友列表
     * @param int $isRefresh
     * @param int $outRawData 1 表示输出原始数据，默认为 0
     * @return Response
     * @throws \Exception
     */
    public function getFriendList($isRefresh = 0, $outRawData = 0)
    {
        $request = new FriendListRequest();
        $request->setRobotWxId($this->notifyData->getRobotWxId());
        $request->setIsRefresh($isRefresh);
        $request->setOutRawdata($outRawData);
        return $request->request();
    }

    public function agreeFriendVerify()
    {

    }
}