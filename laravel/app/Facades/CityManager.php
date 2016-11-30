<?php

namespace App\Facades;

use App\City;

class CityManager 
{
    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function create($array)
    {
        if(!$this->checkCityExist($array['city_name'])){
            $city = $this->city->store($array);
        }else{
            $city = $this->city->getByName($array['city_name']);
        }
        return $city;
    }

    public function checkCityExist($cityname)
    {
        $cities = $this->city->getAll();

        $found_city = null;

        foreach ($cities as $city) {
            if ($city->city_name === $cityname) {
                $found_city = $city;
                break;
            }
        }

        if ($found_city != null) {
            return true;
        }else{
            return false;
        }
    }

}