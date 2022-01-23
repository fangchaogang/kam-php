<?php
namespace Kam\Response;

class CreateGroupResponse extends Response
{
    /**
     * @return mixed
     * 创建成功后的群ID
     */
    public function getGroupWxId()
    {
        return $this->data;
    }
}