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

    public function jobs()
    {
        return $this->hasMany(Job::class, 'company_id', 'id');
    }

    public function format()
    {
        return [
            'customer_id' => $this->id,
            'name' => $this->name,
            'created_by' => $this->user->email,
            'last_updated' => $this->updated_at->diffForHumans(),
        ];
    }

    public function getRouteKeyName()
    {
        return $this->slug;
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($company) { // before delete() method call this
            $company->jobs()->delete;
        });
    }
}
