<?php

namespace App\Controllers;

use App\Core\Database;
use App\Core\View;

class CountriesController
{

    public function index()
    {
        $db = Database::getInstance()->connection();

        $countries = $db->select('countries', '*');

        View::show('Countries/index.php',[
            'countries'=>$countries
        ]);
    }

    public function show(array $params){

        $db = Database::getInstance()->connection();

        $country = $db->select('countries', '*',[
            'id[=]' =>(int) $params['id']
        ])[0];

        View::show('Countries/show.php',[
            'country'=>$country
        ]);
    }
}