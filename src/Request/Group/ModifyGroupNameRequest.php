<?php
namespace Kam\Request\Group;

use Kam\Request\GroupRequest;
use Kam\Response\Response;

/**
 * Class ModifyGroupNameRequest
 * @package Kz\Robot\Request
 * 修改群昵称
 */
class ModifyGroupNameRequest extends GroupRequest
{
    const PATH = '/group/modify_name';

    public function request()
    {
        return new Response(parent::request());
    }

    /**
     * @param string $groupName
     */
    public function setGroupName(string $groupName)
    {
        $this->group_name = $groupName;
    }
}