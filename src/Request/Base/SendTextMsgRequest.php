<?php
namespace Kam\Request\Base;

use Kam\Request\BaseRequest;
use Kam\Response\Response;

/**
 * Class SendTextMsgRequest
 * @package Kz\Robot\Request
 * 发送普通消息
 */
class SendTextMsgRequest extends BaseRequest
{
    const PATH = '/send_msg/text';

    public function request()
    {
        return new Response(parent::request());
    }

    /**
     * @param string $message
     */
    public function setMsg(string $message)
    {
        $this->msg = $message;
    }
}