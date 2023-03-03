<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function subscriber()
    {
        return $this->belongsToMany(Subscriber::class);
    }
}
