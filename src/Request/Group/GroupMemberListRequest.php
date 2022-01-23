<?php
namespace Kam\Request\Group;

use Kam\Request\GroupRequest;
use Kam\Response\Response;

/**
 * Class GroupMemberListRequest
 * @package Kam\Request\Group
 * 获取群成员列表
 */
class GroupMemberListRequest extends GroupRequest
{
    const PATH = '/group/member_list'; //取群成员列表

    public function request()
    {
        return new Response(parent::request());
    }

    /**
     * @param int $isRefresh
     */
    public function setIsRefresh(int $isRefresh)
    {
        $this->is_refresh = $isRefresh;
    }
}