<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'job_user', 'user_id', 'job_id');
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

    // public static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($job) { // before delete() method call this
    //         $job->jobs()->delete;
    //     });
    // }
}
