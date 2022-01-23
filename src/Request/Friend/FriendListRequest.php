<?php
namespace Kam\Request\Friend;

use Kam\Request\BaseRequest;
use Kam\Response\Response;

/**
 * Class FriendListRequest
 * @package Kz\Robot\Request
 * 好友列表
 */
class FriendListRequest extends BaseRequest
{
    const PATH = '/friend/list';

    public function request()
    {
        return new Response(parent::request());
    }

    /**
     * @param int $isRefresh
     */
    public function setIsRefresh(int $isRefresh)
    {
        $this->is_refresh = $isRefresh;
    }

    /**
     * @param int $outRawData
     */
    public function setOutRawdata(int $outRawData = 0)
    {
        $this->out_rawdata = $outRawData;
    }
}