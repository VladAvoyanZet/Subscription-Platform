<?php

namespace App\Http\Controllers;

use App\Services\IndexPostsService;
use Illuminate\Http\Request;

class WebSitePostsController extends Controller
{

   public function index(IndexPostsService $indexPostsService)
   {
       $indexPostsService->posts();
   }

}
