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
    public function store(Request $request, StoreWebSiteService $webSiteController)
    {
        $request->validate([
            'email' => 'required|unique:sites',
            'url' => 'required|unique:sites',
        ]);
        $response = $request->all();
         $webSiteController->storeSubscriberWebSite($response);
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
