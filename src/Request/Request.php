<?php
namespace Kam\Request;
use Kam\Config;
use Kam\Response\Response;
use GuzzleHttp\Client;

abstract class Request implements \JsonSerializable
{
    const USERAGENT = 'kam-php-sdk/' . Config::VERSION;
    const PATH = '/send_msg/text';
    protected $host;
    protected $client;
    protected $parameters = [

    ];

    /**
     * Request constructor.
     */
    public function __construct()
    {
        ini_set('date.timezone','Asia/Shanghai');
        $this->host = Config::getHost();
        $this->client = new Client([
            'base_uri' => Config::getHost(),
            'timeout' => 10
        ]);

        $this->init();
    }

    public function init() {}

    /**
     * @param string $robotWxId
     */
    public function setRobotWxId(string $robotWxId)
    {
        $this->robot_wxid = $robotWxId;
    }

    /**
     * 发起接口请求
     * @return Response
     * @throws \Exception
     */
    public function request()
    {
        $response = $this->client->request('POST', static::PATH, [
            'verify' => false,
            'headers' => [
                'User-Agent' => self::USERAGENT,
                'Accept'     => 'application/json',
                'Content-Type' => 'application/json'
            ],
            'json' => $this->parameters
        ]);
        $original = $response->getBody()->getContents();
        return new Response($original, $this);
    }

    public function jsonSerialize()
    {
        return $this->parameters;
    }

    /**
     * 发起接口请求
     * @return Response
     * @throws \Exception
     */
    public function __invoke()
    {
        return static::request();
    }

    public function __isset($key)
    {
        return isset($this->parameters[$key]);
    }

    public function __get($key)
    {
        return $this->parameters[$key] ?? null;
    }

    public function __set($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    public function __unset($key)
    {
        unset($this->parameters[$key]);
    }

    public function __toString()
    {
        return json_encode($this, JSON_UNESCAPED_UNICODE);
    }

}