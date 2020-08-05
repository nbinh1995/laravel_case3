<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    protected function user(){
        
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
}
