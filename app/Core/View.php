<?php

namespace App\Core;

class View
{

    public static function show(string $path, array $variables = [], ?array $cities =[])
    {
        extract($variables);
        extract($cities);

        require 'app/View/' . $path;
    }
}