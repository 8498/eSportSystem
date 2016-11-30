<?php

namespace App\Facades;

use App\Nationality;

class NationalityManager
{
    public function __construct(Nationality $nationality)
    {
        $this->nationality = $nationality;
    }

    public function create($array)
    {
        if(!$this->checkNationalityExist($array['nationality_name'])){
            $nationality = $this->nationality->store($array);
        }else{
            $nationality = $this->nationality->getByName($array['nationality_name']);
        }
        return $nationality;
    }

    public function checkNationalityExist($nationalityname)
    {
        $nationalities = $this->nationality->getAll();

        $found_nationality = null;

        foreach ($nationalities as $nationality) {
            if ($nationality->nationality_name === $nationalityname) {
                $found_nationality = $nationality;
                break;
            }
        }

        if ($found_nationality != null) {
            return true;
        }else{
            return false;
        }
    }
}