<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'url'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

  }
