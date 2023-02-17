<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'name', 'address', 'amount', 'size', 'layout', 'information','comment', 'image1','image2','image3',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function likes() {
        return $this->hasMany('App\Like');
    }
    public function posts() {
        return $this->hasOne('App\Post');
    }
    public function scopeHouseSearch($query, $data) //検索機能
    {
        if(!is_null($data['amount_row'])){
            $query->where('amount','>=',$data['amount_row']);
        }
        if(!is_null($data['amount_high'])){
            $query->where('amount','<=',$data['amount_high']);
        }
        if(!is_null($data['size_row'])){
            $query->where('size','>=',$data['size_row']);
        }
        if(!is_null($data['size_high'])){
            $query->where('size','<=',$data['size_high']);
        }
        if(!is_null($data['layout_row'])){
            $query->where('layout','>=',$data['layout_row']);
        }
        if(!is_null($data['layout_high'])){
            $query->where('layout','<=',$data['layout_high']);
        }
        if(!is_null($data['address'])){
            $query->orWhere('address','like','%'.$data['address'].'%');
        }
        if(!is_null($data['free'])){
            $query->orWhere('comment','like','%'.$data['free'].'%');
        }
        if(!is_null($data['free'])){
            $query->orWhere('information','like','%'.$data['free'].'%');
        }
        return $query;

    }

}
