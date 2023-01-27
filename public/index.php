<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Autoload\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Url as Lalala;
use Phalcon\Db\Adapter\Pdo\Mysql;

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

$loader = new Loader();

$loader->setDirectories(
    [
        APP_PATH . '/controllers/',
        APP_PATH . '/models/',
    ]
);

$loader->register();

$container = new FactoryDefault();

$container->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');
        return $view;
    }
);

$container->set(
    'url',
    function () {
        $url = new Lalala();
        $url->setBaseUri('/phalcon-tutorial/');
        return $url;
    }
);

$container->set(
    'db',
    function () {
        return new Mysql(
            [
                'host'     => 'localhost',
                'username' => 'root',
                'password' => '',
                'dbname'   => 'tutorial',
                'port' => '3306'
            ]
        );
    }
);

$application = new Application($container);

try {
    // Handle the request
    $url = $_SERVER['REQUEST_URI'];
    $url = str_replace('phalcon-tutorial', '', $url);
    $url = str_replace('//', '/', $url);
    $lala = $application->handle($url);

    $lala->send();

} catch (\Exception $e)  {
    echo 'Exception: ', $e->getMessage();
}
