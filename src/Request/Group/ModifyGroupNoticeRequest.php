<?php
namespace Kam\Request\Group;

use Kam\Request\GroupRequest;
use Kam\Response\Response;

/**
 * Class ModifyGroupNoticeRequest
 * @package Kam\Request\Group
 * 修改群公告
 */
class ModifyGroupNoticeRequest extends GroupRequest
{
    const PATH = '/group/modify_notice';

    public function request()
    {
        return new Response(parent::request());
    }

    /**
     * @param string $groupNotice
     */
    public function setGroupNotice(string $groupNotice)
    {
        $this->content = $groupNotice;
    }
}