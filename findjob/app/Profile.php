<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
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

    // public static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($profile) { // before delete() method call this
    //         $profile->profile()->delete;
    //     });
    // }
}
