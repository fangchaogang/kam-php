<?php
namespace Kam\Tests;

use Kam\Request\Base\SendLinkMsgRequest;
use Kam\Request\Base\SendShareMusicRequest;
use Kam\Request\Base\SendTextMsgRequest;

class BaseRequestTest extends TestCase
{

    public function testRun()
    {
        $robotWxId = 'wxid_lmqw4m0uznw522';
        try {
            //发送消息
            $request = new SendTextMsgRequest();
            $request->setRobotWxId($robotWxId);
            $request->setToWxId('fcg_520');
            $request->setMsg('你好');
            $request->request();
            //发送分享连接
            $request = new SendLinkMsgRequest();
            $request->setRobotWxId($robotWxId);
            $request->setToWxId('fcg_520');
            $request->setTargetUrl('http://www.baidu.com');
            $request->setPicUrl('http://dgj-dev.kzmall.cc/statics/old/css/base/img/cooperation.png?ver=2.20.94');
            $request->setTitle('分享');
            $request->setText('我分享了地址');
            $request->request();
            //发送音乐
            $request = new SendShareMusicRequest();
            $request->setRobotWxId($robotWxId);
            $request->setToWxId('fcg_520');
            $request->setName('十年');
            //...其他自行看代码

        } catch (\Exception $e) {
            throw new $e;
        }
    }
}