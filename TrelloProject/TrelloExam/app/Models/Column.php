<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;
    protected $fillable = ['title','table_id'];

    public function table()
    {
        return $this->belongsTo('App\Models\Table', 'table_id', 'id');
    }
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }


}
