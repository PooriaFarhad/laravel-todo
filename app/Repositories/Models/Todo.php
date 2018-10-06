<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'user_id'];

//    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeCompleted($query) {
        return $query->where('is_completed', 1);
    }
}


