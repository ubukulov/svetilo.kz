<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends BaseController
{
    public function index($alias)
    {
        $category = Category::whereAlias($alias)->first();
        if (!$category) {
            abort(404);
        }
        if (count($category->children) == 0) {
            return view('themes.besmart.category', compact('category'));
        } else {
            return view('themes.besmart.category_view', compact('category'));
        }
    }
}
