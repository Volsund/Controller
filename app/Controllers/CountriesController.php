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


        View::show('Countries/index.php', [
            'countries' => $countries
        ]);
    }

    public function show(array $params)
    {

        $db = Database::getInstance()->connection();

        $country = $db->select('countries', '*', [
            'id[=]' => (int)$params['id']
        ])[0];
        $countryName= $country['name'];

        $cities = $db->select('cities', '*',[
            'country'=>$countryName
        ]);


        View::show('Countries/show.php', [
            'country' => $country
        ],[
            'cities'=>$cities
        ]);
    }

    public function addCountry()
    {
        $country = ucfirst($_POST['name']);
        $db = Database::getInstance()->connection();
        $db->insert('countries', [
            'name' => $country,
        ]);

        $countries = $db->select('countries', '*');

        View::show('Countries/index.php', [
            'countries' => $countries
        ]);
    }

    public function addCity(array $params)
    {
        //Adding city to database
        $countryId = (int)trim($_SERVER['REQUEST_URI'], '/countries/');
        $city = ucfirst($_POST['name']);
        $db = Database::getInstance()->connection();
        $countryName = $db->select('countries', '*', [
            'id[=]' => [$countryId]
        ])[0]['name'];
        $db->insert('cities', [
            'name' => $city,
            'country' => $countryName
        ]);

        //Executing view again
        $country = $db->select('countries', '*', [
            'id[=]' => (int)$params['id']
        ])[0];
        $countryName= $country['name'];

        $cities = $db->select('cities', '*',[
            'country'=>$countryName
        ]);

        View::show('Countries/show.php', [
            'country' => $country
        ],[
            'cities'=>$cities
        ]);
    }
}