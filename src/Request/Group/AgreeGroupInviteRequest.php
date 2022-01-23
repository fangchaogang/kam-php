<?php
namespace Kam\Request\Group;

use Kam\Request\BaseRequest;
use Kam\Response\Response;

class AgreeGroupInviteRequest extends BaseRequest
{
    const TYPE = 302;

    public function request()
    {
        return new Response(parent::request());
    }

    /**
     * @param string $msg
     */
    public function setMsg(string $msg)
    {
        $this->setMsg($msg);
    }
}