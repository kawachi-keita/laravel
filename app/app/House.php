<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'name', 'adress', 'amount', 'size', 'layout', 'information','comment', 'image1','image2','image3',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
