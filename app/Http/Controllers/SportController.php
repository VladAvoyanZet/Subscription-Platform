<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Services\CreateSportPostService;
use Illuminate\Http\Request;
class SportController extends Controller
{
    public function store(Request $request, CreateSportPostService $createSportPostService)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required'
        ]);

        $data = $request->all();

        $createSportPostService->CreatePosts($data);
    }
}
