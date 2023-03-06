<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\SubscriberResource;
use App\Mail\DemoMail;
use App\Models\Post;
use App\Models\Subscribers;
use App\Services\Post\DestroyPostService;
use App\Services\Post\ShowPostService;
use App\Services\Post\StorePostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Subscribers::all());
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
