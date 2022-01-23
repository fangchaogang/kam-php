<?php
namespace Kam\Notify;
/**
 * Class NotifyData
 * @package Kam\Notify
 *
 * 群成员减少：event=GroupMemberDecrease&robot_wxid=wxid_lmqw4m0uznw522&from_wxid=17871913280@chatroom&from_name=1234567预发
 * 群成员增加：event=GroupMemberAdd&robot_wxid=wxid_lmqw4m0uznw522&from_wxid=17871913280@chatroom&from_name=1234567预发
 *
 */
class NotifyData
{
    protected $parameters = [];

    public function __construct(array $notifyData)
    {
        foreach ($notifyData as $key => $value) {
            $this->parameters[$key] = $value;
        }
    }

    const E_LOGIN = 'Login';                  //登陆事件
    const E_GROUP_MSG = 'GroupMsg';           //群聊事件
    const E_FRIEND_MSG = 'FriendMsg';         //私聊消息(包括公众号)
    const E_SEND_OUT_MSG = 'SendOutMsg';      //通过机器人账号发出消息
    const E_RC_TRANSFER = 'ReceivedTransfer'; //接收到转账
    const E_SCAN_CASH_MONEY = 'ScanCashMoney';//面对面收款
    const E_FRIEND_VERIFY = 'FriendVerify';   //好友请求验证
    const E_CONTACT_CHANGE = 'ContactsChange';//联系人变动
    const E_GROUP_MEM_ADD = 'GroupMemberAdd'; //群成员增加(新人进群)
    const E_GROUP_MEM_DEC = 'GroupMemberDecrease';//群成员退出
    const E_SYS_MSG = 'SysMsg';               //系统消息

    /**
     * @return mixed|string
     */
    public function getEvent()
    {
        return $this->parameters['event'] ?? self::E_GROUP_MSG;
    }

    /**
     * 1/文本消息 3/图片消息 34/语音消息 42/名片消息 43/视频 47/动态表情 48/地理位置 49/分享链接 2001/红包 2002/小程序 2003/群邀请 更多请参考 sdk 模块常量值
     * @return int|mixed
     */
    public function getType()
    {
        return $this->parameters['type'] ?? 0;
    }

    /**
     * 来源微信群ID
     * @return mixed|string
     */
    public function getFromWxId()
    {
        return $this->parameters['from_wxid'] ?? '';
    }

    /**
     * 来源微信群名
     * @return mixed|string
     */
    public function getFromName()
    {
        return $this->parameters['from_name'] ?? '';
    }

    /**
     * 来源微信群发言者wxid
     * @return mixed|string
     */
    public function getFinalFromWxId()
    {
        return $this->parameters['final_from_wxid'] ?? '';
    }

    /**
     * 来源微信群发言者微信昵称
     * @return mixed|string
     */
    public function getFinalFromName()
    {
        return $this->parameters['final_from_name'] ?? '';
    }

    /**
     * 机器人微信ID
     * @return mixed|string
     */
    public function getRobotWxId()
    {
        return $this->parameters['robot_wxid'] ?? '';
    }

    /**
     * 发言信息
     * @return mixed|string
     */
    public function getMsg()
    {
        return $this->parameters['msg'] ?? '';
    }


    public function getAllData()
    {
        return $this->parameters;
    }

    public function __get($key)
    {
        return $this->parameters[$key] ?? null;
    }

}