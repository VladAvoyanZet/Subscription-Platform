<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use App\Services\Subscribers\DeleteSubscriberService;
use App\Services\Subscribers\ShowSubscriberService;
use App\Services\Subscribers\StoreSubscribersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  SubscriberResource::collection(Subscriber::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreSubscribersService $storeSubscribersService)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:subscribers',
            'is_sent' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status:' => 400,
                'message:' => 'something went wrong'
            ], 400);
        } else {

            $storeSubscribersService->storeSubscriber($request);
        }

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
