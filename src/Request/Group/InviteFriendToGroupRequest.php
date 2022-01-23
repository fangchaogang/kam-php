<?php
namespace Kam\Request\Group;

use Kam\Request\GroupRequest;
use Kam\Response\Response;

/**
 * Class InviteFriendToGroupRequest
 * @package Kam\Request\Group;
 * 邀请好友加群
 */
class InviteFriendToGroupRequest extends GroupRequest
{
    const PATH = '/group/invite_friend';

    public function request()
    {
        return new Response(parent::request());
    }

    /**
     * @param string $friendWxId
     */
    public function setFriendWxId(string $friendWxId)
    {
        $this->friend_wxid = $friendWxId;
    }
}