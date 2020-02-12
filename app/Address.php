<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    protected $primaryKey = 'user_id';
    
    protected $fillable = [
        'post_code', 'address_line_1', 'address_line_2', 'address_line_3', 'city'
    ];

    public function User()
    {
        return $this->hasOne('App\User');
    }

    public function Orders()
    {
        return $this->hasOne('App\Orders');
    }
}
