<?php
namespace Kam\Request\Base;

use Kam\Request\BaseRequest;
use Kam\Response\Response;

/**
 * Class SendImageMsgRequest
 * @package Kz\Robot\Request
 * 发送图片 插件只支持服务器上的图片
 */
class SendImageMsgRequest extends BaseRequest
{
    const PATH = '/send_msg/image';

    public function request()
    {
        return new Response(parent::request());
    }

    public function setPath(string $path)
    {
        $this->path = $path;
    }

}