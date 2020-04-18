<?php

namespace App\Controllers;

class PostsController
{
    public function index()
    {
        return 'show all posts.';
    }

    public function show(array $params)
    {
        return 'show single post ' . $params['id'];
    }
}
