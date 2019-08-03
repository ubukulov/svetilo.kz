<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Kalnoy\Nestedset\NodeTrait;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Category extends Model
{
    use NodeTrait, Sluggable {
        NodeTrait::replicate as replicateNode;
        Sluggable::replicate as replicateSlug;
    }
    protected $table = 'categories';

    protected $fillable = [
        'title', 'alias', 'parent_id', 'image', 'lft', 'rgt', 'active'
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

    public function getLftName()
    {
        return 'lft';
    }

    public function getRgtName()
    {
        return 'rgt';
    }

    public function getParentIdName()
    {
        return 'parent_id';
    }

    public function replicate(array $except = null)
    {
        $instance = $this->replicateNode($except);
        (new SlugService())->slug($instance, true);

        return $instance;
    }

    public function url()
    {
        return url(route('catalog.view', ['alias' => $this->alias]));
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id');
    }

    public function image()
    {
        if (!empty($this->image)) {
            if (file_exists(base_path('public/uploads/category/').$this->image)) {
                return url('/uploads/category/'.$this->image);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getFilters()
    {
        $filters = Filter::where('status', '=', 1)
                    ->join('category_filters', 'category_filters.filter_id', '=', 'filters.id')
                    ->select('filters.*')
                    ->where('category_filters.category_id', $this->id)
                    ->get();
        return $filters;
    }
}
