<?php

namespace Lib;

use Model\User;
use MongoDB\Driver\Query;
use Predis\Client;
use Symfony\Component\Yaml\Yaml;

class Cache
{
    private static $instance;
    private $connection;

    private function __construct()
    {
        $config = $this->getConfig();
        $this->connect($config);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Cache();
        }
        return self::$instance;
    }

    public function set($key, $value)
    {
        return $this->connection->set($key, $value);
    }

    public function get($key)
    {
        return $this->connection->get($key);
    }

    private function getConfig()
    {
        $configPath = __DIR__ . '/../config.yaml';
        return Yaml::parseFile($configPath);
    }

    private function connect($config)
    {
        $dbCache = $config['app']['dbCache'];

        switch ($dbCache) {
            case 'redis':
                $this->connectRedis($config['redis']);
                break;
            case 'memcached':
                $this->connectMemcached();
                break;
            default:
                throw new \Exception('Invalid cache type');
        }
    }

    private function connectRedis($redisConfig)
    {
        $this->connection = new Client([
            'scheme' => $redisConfig['scheme'],
            'host' => $redisConfig['host'],
            'port' => $redisConfig['port'],
        ]);
    }

    private function connectMemcached()
    {
        $mc = new \Memcached('memcached');
        $mc->addServer('memcache', 11211);
        $this->connection = $mc;
    }

}
