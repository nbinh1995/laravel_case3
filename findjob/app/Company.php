<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function works()
    {
        return $this->hasMany(Work::class, 'company_id', 'id');
    }

    public function getRouteKeyName()
    {
        return $this->slug;
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($company) { // before delete() method call this
            $company->works()->delete;
        });
    }
}
