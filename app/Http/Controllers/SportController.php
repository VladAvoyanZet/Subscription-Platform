<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Services\CreatePostService;
use Illuminate\Http\Request;
class SportController extends Controller
{
    public function store(Request $request, CreatePostService $createPostService)
    {
        $data = $request->all();
        dd($data);
//        $createPostService->CreatePosts();
    }
}
