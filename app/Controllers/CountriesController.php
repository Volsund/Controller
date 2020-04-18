<?php

namespace App\Controllers;

use App\Core\View;

class CountriesController
{

    public function index()
    {
        // Create some logic
        $countries = [
            'LV', 'EE', 'LT'
        ];

        View::show('Countries/index.php', [
            'countries' => $countries
        ]);
    }

}