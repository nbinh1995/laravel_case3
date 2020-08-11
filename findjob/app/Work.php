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

    function salary_number($n)
    {
        // first strip any formatting;
        $n = (0 + str_replace(",", "", $n));

        // is this a number?
        if (!is_numeric($n)) return false;

        // now filter it;
        if ($n > 1000000000000) return round(($n / 1000000000000), 1) . ' k tỷ';
        elseif ($n > 1000000000) return round(($n / 1000000000), 1) . ' tỷ';
        elseif ($n > 1000000) return round(($n / 1000000), 1) . ' tr';
        elseif ($n > 1000) return round(($n / 1000), 1) . ' k';

        return number_format($n);
    }


    public function getRouteKeyName()
    {
        return 'slug';
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
