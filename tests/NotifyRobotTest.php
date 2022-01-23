<?php
namespace Kam\Tests;

use Kam\Notify\NotifyRobot;

class NotifyRobotTest extends TestCase
{
    public  function testRun()
    {
        /**
         * 机器人回调回来的参数
         */
        $data = [
            'event' => 'GroupMsg',
            'from_wxid' => '17871913280@chatroom',
            'from_name' => '1234567',
            'final_from_wxid' => 'fcg_520',
            'final_from_name' => '突破',
            'robot_wxid' => 'wxid_lmqw4m0uznw522',
            'msg' => '好'
        ];
        $response = null;
        try {
            $robot = NotifyRobot::make($data);
            switch ($robot->notifyData->getEvent()) {
                case $robot->notifyData::E_FRIEND_MSG : //私聊
                    $response = $robot->sendTextMsg('私聊消息：' . $robot->notifyData->getMsg()); break;
                case $robot->notifyData::E_GROUP_MSG : //群聊消息
                    //---推送群聊消息
                    //$response = $robot->sendTextMsg('群聊消息：' . $robot->notifyData->getMsg());
                    //---推送群聊消息并艾特
                    //$response = $robot->sendGroupAtMsg('群聊消息:' . $robot->notifyData->getMsg());
                    //---推送图片
                    //$img = 'http://emoji.qpic.cn/wx_emoji/kzl5rrce4qrvQF0UnNKTv0UmTibbsI4zlBw72IMjMzH4h6TwLJQYHfg/';
                    //$response = $robot->sendImageMsg($img);
                    //---发送分享链接
                    //$title = '分享链接';
                    //$text = '今天我分享链接了';
                    //$targetUrl = 'http://www.baidu.com';
                    //$pic = 'http://dgj-dev.kzmall.cc/statics/old/css/base/img/cooperation.png?ver=2.20.94';
                    //$response = $robot->sendLinkMsg($title, $text, $targetUrl, $pic);
                    //---取群成员列表
                    //$groupMember = $robot->getGroupMemberList(); var_dump($groupMember->data());
                    //---取群成员资料
                    //$response = $robot->getGroupMember('fcg_520');
                    //---发送音乐
                    //$response = $robot->sendShareMusic('十年');
                    //---发送小程序
                    //$response = $robot->sendShareMini($xml);
                    //---消息转发
                    //$response = $robot->messageForward('1162574502');
                    //---退出群聊
                    //$response = $robot->quitGroup();
                    //---创建群聊
                    //$response = $robot->createGroup(['fcg_520', 'wxid_kl9tuz8irxum22', 'wxid_3qr4mag09sxe22']);
                    //$groupWxId = $response->getGroupWxId();var_dump($groupWxId);
                    //---修改群名称
                    //$response = $robot->modifyGroupName($groupWxId, '5.0测试修改群昵称');
                    //---修改群公告
                    //$response = $robot->modifyGroupNotice($groupWxId, '5.0测试修改群公告');
                    //---移除群成员
                    //$response = $robot->removeGroupMember('19561440349@chatroom', 'fcg_520');
                    //---邀请好友加群
                    //$response = $robot->inviteFriendToGroup('19561440349@chatroom', 'fcg_520');
                    //---好友列表
                    $response = $robot->getFriendList();var_dump($response->data());

                    break;
            }
            //同意群邀请
            //$response = $robot->agreeGroupInvite();

        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
        $this->assertResponse($response);

    }
}