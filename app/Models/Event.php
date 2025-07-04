<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    protected static function booted()
    {

        if (Auth::hasUser()) {
            static::addGlobalScope('user', function ($query) {
                $query->where('user_id', Auth::user()->id);
            });
        }

    }
}
