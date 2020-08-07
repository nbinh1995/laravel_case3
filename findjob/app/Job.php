<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'job_id', 'id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'job_id', 'id');
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

        static::deleting(function ($job) { // before delete() method call this
            $job->applicants()->delete;
            $job->favorites()->delete;
        });
    }
}
