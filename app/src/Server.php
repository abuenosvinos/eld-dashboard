<?php

namespace App;

class Server
{
    const servers = [
        'server001',
        'server002',
        'server003',
        'server004',
        'server005'
    ];

    private $count;

    public function __construct()
    {
        $this->count = count(self::servers) - 1;
    }

    public function get() {
        return self::servers[rand(0, $this->count)];
    }
}