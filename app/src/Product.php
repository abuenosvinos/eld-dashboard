<?php

namespace App;

class Product
{
    const DATA = [

        //// XBOX ////

        ['name' => 'Call of Duty: Black Ops Cold War', 'category' => 'Game', 'brand' => 'Xbox', 'price' => 59.99],
        ['name' => 'Mortal Kombat 11', 'category' => 'Game', 'brand' => 'Xbox', 'price' => 11.99],
        ['name' => 'PGA TOUR 2K21', 'category' => 'Game', 'brand' => 'Xbox', 'price' => 59.99],
        ['name' => 'Assassin\'s Creed Valhalla', 'category' => 'Game', 'brand' => 'Xbox', 'price' => 49.94],
        ['name' => 'LEGO Disney Pixar\'s The Incredibles', 'category' => 'Game', 'brand' => 'Xbox', 'price' => 18.05],
        ['name' => 'Microsoft Xbox One S 1TB', 'category' => 'Console', 'brand' => 'Xbox', 'price' => 378.00],
        ['name' => 'Newest Flagship Microsoft Xbox One S 1TB HDD Bundle with Two Wireless Controllers', 'category' => 'Console', 'brand' => 'Xbox', 'price' => 448.30],
        ['name' => 'XBOX Console', 'category' => 'Console', 'brand' => 'Xbox', 'price' => 89.99],
        ['name' => 'Xbox Wireless Controller + Wireless Adapte', 'category' => 'Accesories', 'brand' => 'Xbox', 'price' => 79.99],
        ['name' => 'BENGOO V-4 Gaming Headset', 'category' => 'Accesories', 'brand' => 'Xbox', 'price' => 29.98],
        ['name' => 'Xbox One Controller Battery Pack', 'category' => 'Accesories', 'brand' => 'Xbox', 'price' => 22.99],

        //// PLAYSTATION ////

        ['name' => 'Call of Duty: Black Ops Cold War', 'category' => 'Game', 'brand' => 'PlayStation', 'price' => 59.99],
        ['name' => 'Mortal Kombat 11', 'category' => 'Game', 'brand' => 'PlayStation', 'price' => 24.99],
        ['name' => 'PGA TOUR 2K21', 'category' => 'Game', 'brand' => 'PlayStation', 'price' => 59.99],
        ['name' => 'Assassin\'s Creed Valhalla', 'category' => 'Game', 'brand' => 'PlayStation', 'price' => 49.94],
        ['name' => 'LEGO Disney Pixar\'s The Incredibles', 'category' => 'Game', 'brand' => 'PlayStation', 'price' => 18.00],
        ['name' => 'SONY PlayStation 4 Slim 1TB Console', 'category' => 'Console', 'brand' => 'PlayStation', 'price' => 379.00],
        ['name' => 'Sony PlayStation 4 Pro 1TB Console', 'category' => 'Console', 'brand' => 'PlayStation', 'price' => 459.99],
        ['name' => 'PlayStation 4 Slim 500GB', 'category' => 'Console', 'brand' => 'PlayStation', 'price' => 359.36],
        ['name' => 'PlayStation Platinum Wireless Headset', 'category' => 'Accesories', 'brand' => 'PlayStation', 'price' => 142.87],
        ['name' => 'BENGOO V-4 Gaming Headset', 'category' => 'Accesories', 'brand' => 'PlayStation', 'price' => 29.98],
        ['name' => 'DualShock 4 Wireless Controller for PlayStation 4', 'category' => 'Accesories', 'brand' => 'PlayStation', 'price' => 64.99],

        //// MICROSOFT ////

        ['name' => 'Super Mario 3D All-Stars', 'category' => 'Game', 'brand' => 'Nintendo', 'price' => 59.98],
        ['name' => 'Mario Kart 8 Deluxe', 'category' => 'Game', 'brand' => 'Nintendo', 'price' => 39.41],
        ['name' => 'Minecraft', 'category' => 'Game', 'brand' => 'Nintendo', 'price' => 29.95],
        ['name' => 'Hyrule Warriors: Age of Calamity', 'category' => 'Game', 'brand' => 'Nintendo', 'price' => 59.99],
        ['name' => 'Luigi\'s Mansion 3', 'category' => 'Game', 'brand' => 'Nintendo', 'price' => 59.95],
        ['name' => 'Nintendo Switch 32GB', 'category' => 'Console', 'brand' => 'Nintendo', 'price' => 448.89],
        ['name' => 'Nintendo Wii Console with Wii Sports', 'category' => 'Console', 'brand' => 'Nintendo', 'price' => 249.99],
        ['name' => 'Nintendo 2DS - Electric Blue', 'category' => 'Console', 'brand' => 'Nintendo', 'price' => 79.94],
        ['name' => 'Locking Carry Case for Nintendo Switch ', 'category' => 'Accesories', 'brand' => 'Nintendo', 'price' => 39.99],
        ['name' => 'Screen Protector Tempered Glass for Nintendo Switch 3', 'category' => 'Accesories', 'brand' => 'Nintendo', 'price' => 5.99],
        ['name' => 'Centeni Switch Joy Con Charging Dock Charge Station', 'category' => 'Accesories', 'brand' => 'Nintendo', 'price' => 24.99],
    ];

    private $products;
    private $count;

    public function __construct()
    {
        $this->products = [];
        $this->count = 0;
        foreach (self::DATA as $item) {
            $probability = ($item['category'] == 'Game') ? 2 : 1;
            for ($j = 0; $j < $probability; $j++) {
                $this->products[] = $item;
            }
        }

        $this->count = count($this->products) - 1;
    }

    public function get() {
        return $this->products[rand(0, $this->count)];
    }
}