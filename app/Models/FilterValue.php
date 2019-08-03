<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class FilterValue extends Model
{
    use Sluggable;

    protected $table = 'filter_values';

    protected $fillable = [
        'filter_id', 'title', 'alias', 'status'
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

    public function filter()
    {
        return $this->belongsTo('App\Models\Filter', 'filter_id');
    }
}
