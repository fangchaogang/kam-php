<?php
namespace Kam\Request\Group;

use Kam\Request\Request;
use Kam\Response\CreateGroupResponse;

/**
 * Class CreateGroupRequest
 * @package Kam\Request\Group
 * 创建群聊
 */
class CreateGroupRequest extends Request
{
    const PATH = '/group/create';

    public function request()
    {
        return new CreateGroupResponse(parent::request());
    }
    /**
     * @param array $friendWxIds
     */
    public function setFriendWxIds(array $friendWxIds)
    {
        $this->friend_wxid = implode('|', $friendWxIds);
    }
}