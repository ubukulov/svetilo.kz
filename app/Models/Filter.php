<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Filter extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'alias', 'status'
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
}
