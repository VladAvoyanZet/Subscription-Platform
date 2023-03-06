<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\Post\DestroyPostService;
use App\Services\Post\ShowPostService;
use App\Services\Post\StorePostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $posts = Post::all();
//        $result = [];
//        foreach ($posts as $post) {
//            $result[] = [
//                'title' => $post->title,
//                'website' => $post->site
//            ];
//        }
//        return $result;
        return PostResource::collection(Post::all()) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StorePostService $storePostService)
    {
        $request->validate([
            'websiteId' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        $response = $request->all();
        $storePostService->storePost($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, ShowPostService $showPostService)
    {

        $showPostService->showPost($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, DestroyPostService $destroyPostService)
    {
        $destroyPostService->destroyPost($id);
    }
}
