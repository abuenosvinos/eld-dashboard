<?php

namespace App;

class Location
{
    // Proporción por población
    // https://es.wikipedia.org/wiki/Anexo:Provincias_y_ciudades_aut%C3%B3nomas_de_Espa%C3%B1a

    const DATA = [
        ['name' => 'Álava', 'population' => 4],
        ['name' => 'Albacete', 'population' => 5],
        ['name' => 'Alicante', 'population' => 24],
        ['name' => 'Almería', 'population' => 9],
        ['name' => 'Asturias', 'population' => 14],
        ['name' => 'Ávila', 'population' => 2],
        ['name' => 'Badajoz', 'population' => 8],
        ['name' => 'Baleares', 'population' => 16],
        ['name' => 'Barcelona', 'population' => 70],
        ['name' => 'Burgos', 'population' => 4],
        ['name' => 'Cáceres', 'population' => 5],
        ['name' => 'Cádiz', 'population' => 15],
        ['name' => 'Cantabria', 'population' => 7],
        ['name' => 'Castellón', 'population' => 7],
        ['name' => 'Ceuta', 'population' => 1],
        ['name' => 'Ciudad Real', 'population' => 6],
        ['name' => 'Córdoba', 'population' => 10],
        ['name' => 'Cuenca', 'population' => 2],
        ['name' => 'Gerona', 'population' => 10],
        ['name' => 'Granada', 'population' => 11],
        ['name' => 'Guadalajara', 'population' => 3],
        ['name' => 'Guipúzcoa', 'population' => 9],
        ['name' => 'Huelva', 'population' => 7],
        ['name' => 'Huesca', 'population' => 3],
        ['name' => 'Jaén', 'population' => 8],
        ['name' => 'La Coruña', 'population' => 14],
        ['name' => 'La Rioja', 'population' => 4],
        ['name' => 'Las Palmas', 'population' => 14],
        ['name' => 'León', 'population' => 6],
        ['name' => 'Lérida', 'population' => 5],
        ['name' => 'Lugo', 'population' => 4],
        ['name' => 'Madrid', 'population' => 83],
        ['name' => 'Málaga', 'population' => 20],
        ['name' => 'Melilla', 'population' => 1],
        ['name' => 'Murcia', 'population' => 18],
        ['name' => 'Navarra', 'population' => 8],
        ['name' => 'Orense', 'population' => 4],
        ['name' => 'Palencia', 'population' => 2],
        ['name' => 'Pontevedra', 'population' => 12],
        ['name' => 'Salamanca', 'population' => 4],
        ['name' => 'Santa Cruz de Tenerife', 'population' => 14],
        ['name' => 'Segovia', 'population' => 2],
        ['name' => 'Sevilla', 'population' => 24],
        ['name' => 'Soria', 'population' => 1],
        ['name' => 'Tarragona', 'population' => 10],
        ['name' => 'Teruel', 'population' => 2],
        ['name' => 'Toledo', 'population' => 9],
        ['name' => 'Valencia', 'population' => 32],
        ['name' => 'Valladolid', 'population' => 6],
        ['name' => 'Vizcaya', 'population' => 14],
        ['name' => 'Zamora', 'population' => 2],
        ['name' => 'Zaragoza', 'population' => 12]
    ];

    private $provinces;
    private $count;

    public function __construct()
    {
        $this->provinces = [];
        $this->count = 0;
        foreach (self::DATA as $item) {
            $probability = $item['population'];
            for ($j = 0; $j < $probability; $j++) {
                $this->provinces[] = $item['name'];
            }
        }

        $this->count = count($this->provinces) - 1;
    }

    public function get() {
        return $this->provinces[rand(0, $this->count)];
    }
}