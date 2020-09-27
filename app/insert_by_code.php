<?php

use App\Date;
use App\Server;
use App\Product;
use App\Location;
use Elasticsearch\ClientBuilder;

require __DIR__ . '/vendor/autoload.php';

$client = ClientBuilder::create()->build();

/* MASTER DATA */

$nameIndex = 'is-app';

$server = new Server();
$days = new Date();
$products = new Product();
$locations = new Location();

/* INSERTS */

$in = 0;
$err = 0;

for ($i = 0; $i < 300; $i++) {
    $product = $products->get();
    $params = [
        'index' => $nameIndex,
        'body'  => [
            '@timestamp' => $days->get(),
            'server' => $server->get(),
            'product' => $product['name'],
            'category' => $product['category'],
            'brand' => $product['brand'],
            'price' => $product['price'],
            'location' => $locations->get()
        ]
    ];

    try {
        //var_dump($params);
        $response = $client->index($params);
        $in++;
    } catch (Exception $e) {
        // Skip problems, is a test
        $err++;
    }
}

echo "$in registros insertados\n\n";
echo "$err registros con problemas\n\n";
