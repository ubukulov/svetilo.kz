<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    protected $imagePath = 'uploads/products/';
    protected $imagePathThumbs = '/uploads/product-thumbs/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::get()->toTree();
        return view('admin.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('images');
        $product = Product::create($data);
        if ($request->hasFile('images')) {
            $images = [];

            foreach($request->file('images') as $file) {
                $img = \Image::make($file->getPathname());
                $hash_name = md5($file->getClientOriginalName());
                $file_name = $product->id."_".$hash_name.'.jpg';
                $dir = substr($hash_name,0,2).'/'.substr($hash_name, 2, 2);

                $save_path = base_path('public/'.$this->imagePath.$dir);
                if (!file_exists($save_path)) {
                    mkdir($save_path, 755, true);
                }

                $img->save($save_path.'/'.$file_name);

                // сохранение миниатюры

                $save_path_thumbs = base_path('public/'.$this->imagePathThumbs.$dir);

                if (!file_exists($save_path_thumbs)) {
                    mkdir($save_path_thumbs, 755, true);
                }

                $img->resize(180, 180)->save($save_path_thumbs.'/'.$file_name);

                $images[] = $dir.'/'.$file_name;
            }

            $product->images = json_encode($images);
            $product->save();
        }

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $cats = Category::get()->toTree();
        return view('admin.product.edit', compact('product', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('images');
        $product = Product::find($id);
        if ($request->hasFile('images')) {
            $images = [];

            foreach($request->file('images') as $file) {
                $img = \Image::make($file->getPathname());
                $hash_name = md5($file->getClientOriginalName());
                $file_name = $product->id."_".$hash_name.'.jpg';
                $dir = substr($hash_name,0,2).'/'.substr($hash_name, 2, 2);

                $save_path = base_path('public/'.$this->imagePath.$dir);
                if (!file_exists($save_path)) {
                    mkdir($save_path, 755, true);
                }

                $img->save($save_path.'/'.$file_name);

                // сохранение миниатюры

                $save_path_thumbs = base_path('public/'.$this->imagePathThumbs.$dir);

                if (!file_exists($save_path_thumbs)) {
                    mkdir($save_path_thumbs, 755, true);
                }

                $img->resize(180, 180)->save($save_path_thumbs.'/'.$file_name);

                $images[] = $dir.'/'.$file_name;
            }

            $product->images = json_encode($images);
            $product->save();
        } else {
            $product->update($data);
            $product->save();
        }

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.product.index');
    }
}
