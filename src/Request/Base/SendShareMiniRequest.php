<?php
namespace Kam\Request\Base;

use Kam\Request\BaseRequest;
use Kam\Response\Response;

/**
 * Class SendShareMiniRequest
 * @package Kz\Robot\Request
 * 发送小程序
 */
class SendShareMiniRequest extends BaseRequest
{
    const PATH = '/send_msg/share_mini';

    public function request()
    {
        return new Response(parent::request());
    }

    /**
     * @param $xmlContent
     */
    public function setXmlContent($xmlContent)
    {
        $this->xml_content = $xmlContent;
    }
}