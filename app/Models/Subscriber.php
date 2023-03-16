<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'site_id'];

    public function sites()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }

}
