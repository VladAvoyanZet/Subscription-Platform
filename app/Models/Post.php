<?php

namespace App\Models;

use http\Exception\BadUrlException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['websiteId', 'title', 'description'];

    public function site()
    {
        return $this->belongsTo(Site::class, "websiteId");
    }
}
