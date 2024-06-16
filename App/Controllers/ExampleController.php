<?php

namespace App\Controllers;

use App\Controllers\Contracts\AbstractBaseController;
use App\Core\Http\Request;

class ExampleController extends AbstractBaseController
{
    public function index(Request $request, $slug, $id)
    {
        var_dump($slug, $id);
        echo "I Run bro " . rand(100, 1000);
    }

    public function oneParam(Request $request , $slug)
    {
        dd($slug);
    }
}