<?php
namespace Kam\Request\Base;

use Kam\Request\BaseRequest;
use Kam\Response\Response;

/**
 * Class SendShareMusicRequest
 * @package Kz\Robot\Request
 * 发送音乐
 */
class SendShareMusicRequest extends BaseRequest
{
    const PATH = '/send_msg/share_music';

    public function request()
    {
        return new Response(parent::request());
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param int $type
     */
    public function setType(int $type)
    {
        $this->type = $type;
    }
}