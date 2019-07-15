<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'alias', 'category_id', 'seo_keywords', 'seo_description', 'short_description', 'full_description',
        'images', 'article', 'base_price', 'price', 'old_price', 'quantity', 'status'
    ];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'alias' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function image($size = 'd', $all = false)
    {
        $imageDir = ($size == 'd') ? '/uploads/products/' : '/uploads/product-thumbs/';
        if (!$all) {
            $images = json_decode($this->images, true);
            $imagePath = $imageDir.array_values($images)[0];
            return $imagePath;
        }
    }

    public function url()
    {
        return url($this->alias.'/'.$this->id);
    }

    public function getPrice()
    {
        return $this->price;
    }
}
