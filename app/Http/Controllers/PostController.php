<?php

namespace App\Http\Controllers;

use App\Services\Post\DestroyPostService;
use App\Services\Post\IndexPostsService;
use App\Services\Post\ShowPostService;
use App\Services\Post\StorePostService;
use App\Services\Post\UpdatePostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexPostsService $indexPostsService)
    {
        return $indexPostsService->indexPosts();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StorePostService $storePostService)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'site_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status:' => 400,
                'message:' => 'something went wrong'
            ], 400);
        } else {

            $storePostService->storePost($request);
        }
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
    public function update(Request $request, string $id, UpdatePostService $updatePostService)
    {
        $updatePostService->updatePost($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, DestroyPostService $destroyPostService)
    {
        $destroyPostService->destroyPost($id);
    }
}
