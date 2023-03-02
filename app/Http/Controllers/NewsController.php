<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required'
        ]);
        dd($request->all());
    }
}
