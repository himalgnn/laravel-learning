<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['title', 'slug', 'image', 'icon', 'description', 'rank', 'status', 'created_by', 'updated_by'];
    protected $table = 'categories';

}
