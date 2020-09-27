<?php

namespace App;

use DateInterval;
use DateTime;

class Date
{
    private $dates;
    private $countDates;

    private $hours;
    private $countHours;

    public function __construct()
    {
        $diff1Day = new DateInterval('P1D');
        $date =  new DateTime();

        $this->dates = [];
        $this->countDates = 0;
        for ($i = 0; $i < 365; $i++) {
            $date = $date->sub($diff1Day);
            $probability = $this->isWeekend($date) ? 3 : 8;
            for ($j = 0; $j < $probability; $j++) {
                $this->dates[] = $date->format('Y-m-d');
            }
        }
        $this->countDates = count($this->dates) - 1;

        $this->hours = [];
        $this->countHours = 0;
        for ($i = 0; $i < 24; $i++) {
            $probability = $this->probabilityHour($i);
            for ($j = 0; $j < $probability; $j++) {
                $this->hours[] = $i;
            }
        }
        $this->countHours = count($this->hours) - 1;
    }

    public function get() {
        $hour = $this->hours[rand(0, $this->countHours)];
        $hour = str_pad($hour, 2, "0", STR_PAD_LEFT);
        $minute = str_pad(rand(0,59), 2, "0", STR_PAD_LEFT);
        $second = str_pad(rand(0,59), 2, "0", STR_PAD_LEFT);
        return $this->dates[rand(0, $this->countDates)] . 'T'.$hour.':'.$minute.':'.$second.'Z';
    }

    private function isWeekend($date) {
        return $date->format('N') >= 6;
    }

    private function probabilityHour($i) {
        switch ($i) {
            case 1:case 2:case 3:case 4:case 5:
                return 1;
            case 0:case 6:case 7:
                return 2;
            case 23:case 8:case 14:
                return 3;
            case 22:case 21:case 20:case 19:case 9:case 10:case 13:case 15:
                return 4;
            default:
                return 5;
        }
    }
}