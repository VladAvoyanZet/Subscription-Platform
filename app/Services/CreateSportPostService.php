<?php

namespace App\Services;

use App\Models\Sport;
use Tests\CreatesApplication;

class CreateSportPostService
{
    public function CreatePosts($data)
    {
        echo  Sport::create([
            'title' => $data['title'],
            'description' => $data['description']
        ]);
    }

}
