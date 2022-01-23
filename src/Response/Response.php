<?php
namespace Kam\Response;
use Kam\Request\Request;

class Response implements \JsonSerializable
{
    const SUCCESS_CODE = 0;

    public $request;
    public $original;
    public $data;

    /**
     * Response constructor.
     * @param $original 原始返回数据
     * @param $original
     * @param Request|null $request
     * @throws \Exception
     */
    public function __construct($original, Request $request = null)
    {
        switch (true) {
            case $original instanceof Response:
                foreach (get_object_vars($original) as $key => $value) {
                    if (property_exists($this, $key)) {
                        $this->$key =& $value;
                    }
                }
                break;
            default:
                if (empty($original)) {
                    throw new \Exception('机器人服务返回结果为空');
                }

                $this->request = $request;
                $this->original = $original;
                $this->parseOriginal();
        }
    }

    /**
     * 解析原始数据
     * @throws \Exception
     */
    protected function parseOriginal()
    {
        $response = json_decode($this->original);
        if (empty($response)) {
            throw new \Exception('机器人服务返回数据异常', $this);
        }
        $code = $response->code ?? self::SUCCESS_CODE;
        $msg = $response->code == 0 ? 'OK' : 'FAIL';
        $this->data = !empty($response->data) ? json_decode(urldecode($response->data)) : new \stdClass();
        if ($this->data === null) {
            $this->data = $response->data;
        }
        if (intval($code) != self::SUCCESS_CODE) {
            throw new \Exception($msg, $code);
        }
    }

    public function data()
    {
        $data = is_string($this->data) ? $this->data : (array) $this->data;
        if(empty($data)) {
            return [];
        }
        return $data;
    }

    public function jsonSerialize()
    {
        return $this->data;
    }

    public function __get($key)
    {
        return $this->data->$key ?? null;
    }

    public function __call($name, $arguments)
    {

    }

    public function __isset($key)
    {
        return isset($this->data->$key);
    }

    public function __toString()
    {
        return (string)$this->original;
    }
}
