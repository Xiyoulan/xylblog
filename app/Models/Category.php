<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use ModelTree,
        AdminBuilder;

    protected $fillable = ['name', 'description',];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('order');
        $this->setTitleColumn('name');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }

}
