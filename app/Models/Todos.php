<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Todos extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'check', 'user_id'
    ];

    protected static function booted() {
        static::creating( function (Todos $todos) {
            $todos->user_id = Auth::id();
        });
    }
}
