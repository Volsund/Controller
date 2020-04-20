<?php

namespace App\Core;
use Medoo\Medoo;

class Database
{
    private $connection;

    public static $instance = null;

    public function __construct()
    {
        if (self::$instance === null) {
            self::$instance = $this;
        }
        $config = require'config/configdata.php';
        $this->connection = new Medoo($config);

    }

    public static function getInstance(): self
    {
        return self::$instance ?? new Database();
    }

    public function connection (){
        return $this->connection;
    }








//    private $database;
//
//    public function __construct($database)
//    {
//        $this->database=$database;
//    }
//
//    public static function addCountry($database,string $name){
//        $database->insert('countries', [
//            'name' => $name,
//        ]);
//    }
//
//    public static function allCountries(){
//
//    }

}