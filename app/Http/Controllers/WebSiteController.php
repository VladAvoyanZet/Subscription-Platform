<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubscriberResource;
use App\Http\Resources\WebSiteResource;
use App\Models\Site;
use App\Services\WebSiteService;
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
    public function store(Request $request, WebSiteService $webSiteController)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $response = $request->all();
        return $webSiteController->storeSubs($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
