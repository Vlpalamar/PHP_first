<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'column_id','description','table_id'];

    public function column()
    {
        return $this->belongsTo('App\Models\Column', 'column_id', 'id');
    }
}
