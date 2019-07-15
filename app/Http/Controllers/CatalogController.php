<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends BaseController
{
    public function index($alias)
    {
        $category = Category::whereAlias($alias)->first();
        return view('themes.besmart.category', compact('category'));
    }
}
