<?php
namespace Kam\Request;

class GroupRequest extends Request
{
    /**
     * @param string $groupWxId
     */
    public function setGroupWxId(string $groupWxId)
    {
        $this->group_wxid = $groupWxId;
    }
}