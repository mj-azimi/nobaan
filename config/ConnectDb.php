<?php
namespace Config;

use Predis\Client;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class ConnectDb {
    private static $instance = null;

    public function __construct() {
        $configPath = __DIR__.'/../config.yaml';
        // خواندن اطلاعات فایل YAML
        $databaseInfo = Yaml::parseFile($configPath)['database'];
        $redisConfig = Yaml::parseFile($configPath)['redis'];

        // اتصال به MySQL
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    =>    'mysql',
            'host'      =>    'mysql',
            'database'  =>    'nobaan',
            'username'  =>    'root',
            'password'  =>    12345678,
            'charset'   =>    'UTF8',
            'collation' =>    'utf8_unicode_ci',
            'prefix'    =>    ''
        ]);
        // Set the event dispatcher used by Eloquent models... (optional)
        $capsule->setEventDispatcher(new Dispatcher(new Container));

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();



        // اتصال به Redis
        $this->redis = new Client([
            'scheme' => $redisConfig['scheme'],
            'host'   => $redisConfig['host'],
            'port'   => $redisConfig['port'],
        ]);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new ConnectDb();
        }
        return self::$instance;
    }


    public function getRedis() {
        return $this->redis;
    }
}
