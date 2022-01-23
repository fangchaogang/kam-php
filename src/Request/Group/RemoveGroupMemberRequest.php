<?php
namespace Kam\Request\Group;

use Kam\Response\Response;

/**
 * Class RemoveGroupMemberRequest
 * @package Kam\Request\Group;
 * 移除群成员
 */
class RemoveGroupMemberRequest extends GroupMemberDetailRequest
{
    const PATH = '/group/remove_member';

    public function request()
    {
        return new Response(parent::request());
    }
}