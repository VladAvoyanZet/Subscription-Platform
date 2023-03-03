<?php

namespace App\Services;

use App\Models\Site;

class WebSiteService
{
    public function storeSubs($request)
    {
        return Site::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);
    }
}
