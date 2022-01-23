<?php
namespace Kam\Response\Group;

use Kam\Response\Response;

class GroupMemberResponse extends Response
{
    /**
     * @return string
     * 成员微信ID
     */
    public function getAccountWxId()
    {
        return $this->account_wxid;
    }

    /**
     * @return string
     * 成员微信头像
     */
    public function getHeadImgUrl()
    {
        return $this->headimgurl;
    }

    /**
     * @return string
     * 成员微信昵称
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @return int
     * 成员性别 1男 2女
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @return string
     * 成员微信签名
     */
    public function getSignature()
    {
        return $this->signature;
    }
    /**
     * @return string
     * 成员微信朋友圈封面图片
     */
    public function getBackGroundImgUrl()
    {
        return $this->backgroundimgurl;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     * 成员微信号
     */
    public function getWxNum()
    {
        return $this->wx_num;
    }

    /**
     * @return string
     */
    public function getWxId()
    {
        return $this->wxid;
    }
}