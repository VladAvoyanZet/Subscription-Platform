<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class UpdatePostService
{
    public function updatePost($request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return "something went wrong";
        }else {
            $product = Post::find($id);
            $product->title = $input['title'];
            $product->description = $input['description'];
            $product->save();
        }
    }
}
