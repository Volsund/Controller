<?php

namespace App\Controllers;

class UsersController
{

    public function index()
    {
        return 'show all users.';
    }

    public function show(array $params)
    {
        return 'show single user ' . $params['id'];
    }

}