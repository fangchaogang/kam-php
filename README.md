### 安装

```shell
composer require fangchaogang/kam-php "v1.*"
```

### 配置

在 .env 或者环境变量中加入

```ini
KAM_URL=http://10.10.21.22:8073
```

### 使用
[接口文档](http://blog.52keji.site/articles/2022/01/14/1642237882500)

#### 请求

```php
use Kam\Request\Base\SendLinkMsgRequest;
use Kam\Request\Base\SendShareMusicRequest;
use Kam\Request\Base\SendTextMsgRequest;
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
    //...其他请参考文档

} catch (\Exception $e) {
      //接口逻辑处理失败（明确返回的失败）
      //错误码：$e->getCode()
      //错误信息：$e->getMessage()
}
```

#### 机器人回调处理

```php
use Kam\Notify\NotifyRobot;
//机器人回调参数（假设已经处理成数组）
$data = [
    'event' => 'GroupMsg',
    'from_wxid' => '17871913280@chatroom',
    'from_name' => '1234567',
    'final_from_wxid' => 'fcg_520',
    'final_from_name' => '突破',
    'robot_wxid' => 'wxid_lmqw4m0uznw522',
    'msg' => '好'
];
try {
    //NotifyRobot封装了request大部分接口，可以快捷的对事件进行处理
    $robot = NotifyRobot::make($data);
    switch ($robot->notifyData->getEvent()) {
        case $robot->notifyData::E_FRIEND_MSG: //私聊
             $response = $robot->sendTextMsg('私聊消息：' . $robot->notifyData->getMsg()); break;
        case $robot->notifyData::E_GROUP_MSG: //群聊消息
            //处理逻辑
             break;
        case $robot->notifyData::E_FRIEND_MSG: //私聊消息(包括公众号)
            break;
        //具体事件请参考notifyData对象
    }

} catch (\Exception $e) {
      //接口逻辑处理失败（明确返回的失败）
      //错误码：$e->getCode()
      //错误信息：$e->getMessage()
}
```
### 更新

```shell
composer update fangchaogang/kam-php
```

### 反馈

若有任何建议或者问题，欢迎给我们 [提 issue](https://github.com/fangchaogang/kam-php/issues/new)
