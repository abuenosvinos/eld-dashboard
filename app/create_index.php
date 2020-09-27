<?php

use Elasticsearch\ClientBuilder;

require __DIR__ . '/vendor/autoload.php';


$client = ClientBuilder::create()->build();

/* INDEX TO SAVE DATA FROM APP */

$nameIndex = 'is-app';
$response = $client->indices()->create([
    'index' => $nameIndex,
    'body' => [
        'mappings' => [
            'properties' => [
                'server' => ['type' => 'keyword'],
                'product' => ['type' => 'keyword'],
                'category' => ['type' => 'keyword'],
                'brand' => ['type' => 'keyword'],
                'location' => ['type' => 'keyword'],
                'price' => ['type' => 'float']
            ]
        ]
    ]
]);

/* INDEX TO SAVE DATA FROM LOGS */

$nameIndex = 'is-logstash-logs';
$response = $client->indices()->create([
    'index' => $nameIndex,
    'body' => [
        'mappings' => [
            'properties' => [
                'ocurred-on' => ['type' => 'date'],
                'server' => ['type' => 'keyword'],
                'product' => ['type' => 'keyword'],
                'category' => ['type' => 'keyword'],
                'brand' => ['type' => 'keyword'],
                'location' => ['type' => 'keyword'],
                'price' => ['type' => 'float']
            ]
        ]
    ]
]);
