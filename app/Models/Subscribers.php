<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    use HasFactory;
    protected $table = 'subscribers';
    protected $fillable = ['email', 'websiteId'];

    public function site()
    {
        return $this->belongsTo(Site::class, 'websiteId');
    }

}
