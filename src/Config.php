<?php
namespace Kam;
use Kam\Exception\ConfigException;

final class Config
{
    const VERSION = '1.0';
    protected static $host = 'http://10.90.21.71:8073';
    const ENV_KEYS = [
        'host' => 'KAM_URL',
    ];

    /**
     * @return string
     * @throws ConfigException
     */
    public static function getHost(): string
    {
        if ($host = self::getEnv('host')) {
            return $host;
        }
        return self::$host;
    }

    /**
     * 读取环境变量配置
     * @param string $item
     * @param string $type
     * @return mixed
     * @throws ConfigException
     */
    private static function getEnv(string $item, string $type = 'string')
    {
        $value = getenv($envKey = self::ENV_KEYS[$item]);
        if ($value === false) {
            return false;
        }

        if (!settype($value, $type)) {
            throw new ConfigException('配置参数类型不正确[' . $type . ']：' . $envKey);
        }

        return $value;
    }
}
