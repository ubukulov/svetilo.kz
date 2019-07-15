<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __construct()
    {
        $this->hasSlider = true;
    }

    public function welcome()
    {
        parent::__construct();
        return view('themes.besmart.index');
    }
}
