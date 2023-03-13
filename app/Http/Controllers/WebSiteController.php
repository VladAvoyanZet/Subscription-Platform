<?php

namespace App\Http\Controllers;

use App\Http\Resources\WebSiteResource;
use App\Models\Site;
use App\Services\Website\DestroyWebSiteService;
use App\Services\Website\ShoWebSiteService;
use App\Services\Website\StoreWebSiteService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\NoReturn;

class WebSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return WebSiteResource::collection(Site::all()) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    #[NoReturn] public function store(Request $request, StoreWebSiteService $webSiteController)
    {
        $validator = Validator::make($request->all(), [
            'domain' => 'required|unique:sites',
            'subscriber_id' => 'required',
            'is_sent' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status:' => 400,
                'message:' => 'something went wrong'
            ], 400);
        } else {
            $webSiteController->storeSubscriberWebSite($request);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, ShoWebSiteService $showWebSiteService)
    {
        $showWebSiteService->showWebsite($id);
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
    public function destroy(string $id, DestroyWebSiteService $destroyWebSiteService)
    {
        $destroyWebSiteService->deleteWebsite($id);
    }
}
