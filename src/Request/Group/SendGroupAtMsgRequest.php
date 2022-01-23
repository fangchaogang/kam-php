<?php
namespace Kam\Request\Group;

use Kam\Request\Request;
use Kam\Response\Response;

/**
 * Class SendGroupAtMsgRequest
 * @package Kam\Request\Group
 * 发消息并艾特群成员
 */
class SendGroupAtMsgRequest extends Request
{
    const PATH = '/send_msg/group_at';

    public function request()
    {
        return new Response(parent::request());
    }

    /**
     * @param string $toWxId
     */
    public function setToWxId(string $toWxId)
    {
        $this->to_wxid = $toWxId;
    }

    /**
     * @param string $memberWxId
     */
    public function setMemberWxId(string $memberWxId)
    {
        $this->member_wxid = $memberWxId;
    }

    /**
     * @param string $memberName
     */
    public function setMemberName(string $memberName)
    {
        $this->member_name = $memberName;
    }

    /**
     * @param string $message
     */
    public function setMsg(string $message)
    {
        $this->msg = $message;
    }

}