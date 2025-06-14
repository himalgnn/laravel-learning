<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['name','title', 'slug', 'description', 'status', 'created_by', 'updated_by'];
    protected $table = 'tags';

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by','id');
    } 
}
