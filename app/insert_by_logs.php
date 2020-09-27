<?php

require __DIR__ . '/vendor/autoload.php';

use App\Date;
use App\Location;
use App\Product;
use App\Server;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

// create a log channel
$log = new Logger('logger');

// Log to stdout
$stdoutHandler = new \Monolog\Handler\ErrorLogHandler();
$formatter = new \Monolog\Formatter\JsonFormatter();
$stdoutHandler->setFormatter($formatter);
$log->pushHandler($stdoutHandler);

// File Rotating Handler
$fileRotatignHandler = new \Monolog\Handler\RotatingFileHandler('../var/logs/filebeat/app.log', 0, Logger::DEBUG);
$formatter = new \Monolog\Formatter\JsonFormatter();
$fileRotatignHandler->setFormatter($formatter);
$log->pushHandler($fileRotatignHandler);

// File Handler
$fileHandler = new StreamHandler('../var/logs/logstash/app.log', Logger::DEBUG);
$formatter = new \Monolog\Formatter\LineFormatter("%context%\n");
$fileHandler->setFormatter($formatter);
$log->pushHandler($fileHandler);

/* MASTER DATA */

$server = new Server();
$days = new Date();
$products = new Product();
$locations = new Location();

/* INSERTS */

$in = 0;
$err = 0;

for ($i = 0; $i < 50000; $i++) {
    $product = $products->get();
    $params = [
        'ocurred-on' => $days->get(),
        'server' => $server->get(),
        'product' => $product['name'],
        'category' => $product['category'],
        'brand' => $product['brand'],
        'price' => $product['price'],
        'location' => $locations->get()
    ];

    try {
        //var_dump($params);
        $log->warn('No message', $params);
        $in++;
    } catch (Exception $e) {
        // Skip problems, is a test
        $err++;
    }
}



