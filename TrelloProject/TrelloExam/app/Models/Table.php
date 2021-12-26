<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'pivot_tables_users','table_id','user_id');
    }
    public function columns()
    {
        return $this->hasMany('App\Models\Column');
    }
}
