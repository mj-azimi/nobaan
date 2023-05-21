<?php

namespace Config;

use Predis\Client;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class ConnectDb
{
    private $config;
    private static $instance = null;

    public function __construct()
    {
        $this->config = $this->getConfig();
    }

    private function getConfig()
    {
        $configPath = __DIR__ . '/../config.yaml';
        return Yaml::parseFile($configPath);
    }



    public function connectMysql()
    {
        $databaseInfo = $this->config['database'];

        $capsule = new Capsule;

        $capsule->addConnection($databaseInfo);
        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new ConnectDb();
        }
        return self::$instance;
    }
}
