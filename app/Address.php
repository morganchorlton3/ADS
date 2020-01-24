<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    protected $primaryKey = 'userID';
    
    protected $fillable = [
        'userID', 'post_code', 'address_line_1', 'address_line_2', 'address_line_3', 'city'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
