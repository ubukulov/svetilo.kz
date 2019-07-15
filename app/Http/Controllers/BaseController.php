<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use View;

class BaseController extends Controller
{
    protected $hasSlider = false;

    public function __construct()
    {
        $cats = Category::where('active', 1)->get()->toTree();
        $pages = Page::all();
        View::share('cats', $cats);
        View::share('pages', $pages);
        View::share('hasSlider', $this->hasSlider);
    }
}
