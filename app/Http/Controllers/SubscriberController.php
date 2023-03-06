<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\SubscriberResource;
use App\Models\Post;
use App\Models\Subscribers;
use App\Services\Subscribers\DeleteSubscriberService;
use App\Services\Subscribers\ShowSubscriberService;
use App\Services\Subscribers\StoreSubscribersService;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SubscriberResource::collection(Subscribers::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreSubscribersService $storeSubscribersService)
    {
        $request->validate([
            'email' => 'required|unique:subscribers',
        ]);
        $response = $request->all();

        $storeSubscribersService->storeSubscriber($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, ShowSubscriberService $showSubscriberService)
    {
        $showSubscriberService->showSubscriber($id);
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
    public function destroy(string $id, DeleteSubscriberService $deleteSubscriberService)
    {
        $deleteSubscriberService->deleteSubscriber($id);
    }
}
