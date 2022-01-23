<?php
namespace Kam\Request\Base;

use Kam\Request\BaseRequest;
use Kam\Response\Response;

/**
 * Class SendLinkMsgRequest
 * @package Kz\Robot\Request
 * 发送分享连接
 */
class SendLinkMsgRequest extends BaseRequest
{
    const PATH = '/send_msg/share_link';

    public function request()
    {
        return new Response(parent::request());
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @param string $targetUrl
     */
    public function setTargetUrl(string $targetUrl)
    {
        $this->target_url = $targetUrl;
    }

    /**
     * @param string $picUrl
     */
    public function setPicUrl(string $picUrl)
    {
        $this->pic_url = $picUrl;
    }

    /**
     * @param string $iconUrl
     */
    public function setIconUrl(string $iconUrl)
    {
        $this->icon_url = $iconUrl;
    }
}