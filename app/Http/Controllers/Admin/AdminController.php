<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoryFilter;
use App\Models\Product;
use App\Models\ProductFilterValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }

    public function fv_product(Request $request)
    {
        $fv_array = $request->input('filter_values');
        $product_id = $request->input('product_id');
        $product = Product::find($product_id);
        DB::transaction(function () use ($fv_array, $product){
            foreach($fv_array as $f_id=>$fv_arr) {
                $fv = (int) $fv_arr[0];
                if ($fv != 0) {
                    if (!CategoryFilter::exists($product->category_id, $f_id)) {
                        CategoryFilter::create([
                            'category_id' => $product->category_id, 'filter_id' => $f_id
                        ]);
                    }

                    if (!ProductFilterValue::exists($product->id, $fv)) {
                        ProductFilterValue::create([
                            'product_id' => $product->id, 'product_filter_value_id' => $fv
                        ]);
                    }
                }
            }
        });

        return redirect()->route('admin.product.index');
    }
}
