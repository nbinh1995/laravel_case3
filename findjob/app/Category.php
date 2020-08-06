<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'category_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($category) { // before delete() method call this
            $category->jobs()->delete;
        });
    }
}
