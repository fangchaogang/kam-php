<?php
namespace Kam\Request\Group;

use Kam\Request\GroupRequest;
use Kam\Response\Group\GroupMemberResponse;

/**
 * Class GetGroupMemberRequest
 * @package Kam\Request\Group
 * 获取成员详情
 */
class GroupMemberDetailRequest extends GroupRequest
{
    const PATH = '/group/member_detail'; //取群成员资料

    public function request()
    {
        return new GroupMemberResponse(parent::request());
    }

    /**
     * @param string $memberWxId
     */
    public function setMemberWxId(string $memberWxId)
    {
        $this->member_wxid = $memberWxId;
    }

    /**
     * @param int $isRefresh
     */
    public function setIsRefresh(int $isRefresh)
    {
        $this->is_refresh = $isRefresh;
    }
}