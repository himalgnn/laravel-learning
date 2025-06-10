<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['title', 'slug', 'image', 'icon', 'description', 'rank', 'status', 'created_by', 'updated_by'];
    protected $table = 'categories';

}
