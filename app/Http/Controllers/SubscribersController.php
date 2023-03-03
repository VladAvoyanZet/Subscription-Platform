<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use App\Services\Subscribers\DestroySubscriberService;
use App\Services\Subscribers\ShowSubscriberService;
use App\Services\Subscribers\StoreSubscriberService;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SubscriberResource::collection(Subscriber::all()) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreSubscriberService $subscriberService)
    {
        $request->validate([
            'email' => 'required|unique:subscribers',
        ]);

        $req = $request->all();

        $subscriberService->storeSubs($req);
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
    public function destroy(string $id, DestroySubscriberService $deleteSub)
    {
         $deleteSub->deleteSubscriber($id);
    }
}
