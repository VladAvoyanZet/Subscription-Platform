<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['site_id', 'title', 'description'];

    public function sites()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }

}
