<?php

use Illuminate\Database\Capsule\Manager;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';

$conf = require '../src/conf.php';

$dbManager = new Manager();
$dbManager->addConnection([
    'driver' => 'mysql',
    'host' => $conf['DB_HOST'],
    'database' => $conf['DB_NAME'],
    'username' => $conf['DB_USER'],
    'password' => $conf['DB_PASS'],
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
  ]);

  $dbManager->setAsGlobal();
  $dbManager->bootEloquent();

  $app = AppFactory::create();

  $routes = require '../src/routes.php';
  $routes($app);

  $app->run();
  