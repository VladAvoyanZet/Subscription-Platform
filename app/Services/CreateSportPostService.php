<?php

namespace App\Services;

use App\Models\Sport;
use Tests\CreatesApplication;

class CreateSportPostService
{

    /** Method for create posts for Sport Website
     * @param $data
     * @return void
     */
    public function CreatePosts($data)
    {
        echo Sport::create([
            'title' => $data['title'],
            'description' => $data['description']
        ]);
    }

}
