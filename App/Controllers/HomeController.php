<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        echo "I Run bro " . rand(100 , 1000);
        return view('');
    }
}