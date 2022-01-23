<?php
namespace Kam\Request;

class BaseRequest extends Request
{

    /**
     * @param string $toWxId
     */
    public function setToWxId(string $toWxId)
    {
        $this->to_wxid = $toWxId;
    }
}
