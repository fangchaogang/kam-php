<?php
namespace Kam\Request\Base;

use Kam\Request\BaseRequest;
use Kam\Response\Response;

/**
 * Class MessageForwardRequest
 * @package Kz\Robot\Request
 * 消息转发
 */
class MessageForwardRequest extends BaseRequest
{
    const PATH = '/send_msg/forward';

    public function request()
    {
        return new Response(parent::request());
    }

    /**
     * @param string $msgId
     */
    public function setMsgId(string $msgId)
    {
        $this->msg_id = $msgId;
    }
}