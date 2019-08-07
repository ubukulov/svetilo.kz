<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use View;
use Jenssegers\Agent\Agent;

class BaseController extends Controller
{
    protected $hasSlider = false;
    protected $agent;

    public function __construct()
    {
        $cats = Category::where('active', 1)->get()->toTree();
        $pages = Page::all();
        $this->agent = new Agent();
        View::share('cats', $cats);
        View::share('pages', $pages);
        View::share('hasSlider', $this->hasSlider);
        View::share('agent', $this->agent);
    }
}
