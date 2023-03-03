<?php

namespace App\Http\Controllers;

use App\Http\Resources\WebSiteResource;
use App\Models\Site;
use App\Services\Website\DestroyWebSiteService;
use App\Services\Website\ShoWebSiteService;
use App\Services\Website\StoreWebSiteService;
use Illuminate\Http\Request;

class WebSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return WebSiteResource::collection(Site::all()) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreWebSiteService $webSiteController)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $response = $request->all();
         $webSiteController->storeWebSite($response);
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
