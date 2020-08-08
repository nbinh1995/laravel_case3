<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
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
        return $this->hasMany(Applicant::class, 'work_id', 'id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'work_id', 'id');
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

        static::deleting(function ($work) { // before delete() method call this
            $work->applicants()->delete;
            $work->favorites()->delete;
        });
    }
}
