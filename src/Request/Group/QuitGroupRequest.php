<?php
namespace Kam\Request\Group;

use Kam\Request\GroupRequest;
use Kam\Response\Response;

/**
 * Class QuitGroupRequest
 * @package Kam\Request\Group;
 * 退出群
 */
class QuitGroupRequest extends GroupRequest
{
    const PATH = '/group/quit'; //退出群

    public function request()
    {
        return new Response(parent::request());
    }
}