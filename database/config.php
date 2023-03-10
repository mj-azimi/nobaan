<?php
use Illuminate\Database\Capsule\Manager as Capsule;



// connect db
$conn = mysqli_connect(
    $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'],
    $_ENV['DB_USERNAME'],
    $_ENV['DB_PASSWORD'],
    $_ENV['DB_DATABASE']);

if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'],
    'database'  => $_ENV['DB_DATABASE'],
    'username'  => $_ENV['DB_USERNAME'],
    'password'  => $_ENV['DB_PASSWORD'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();