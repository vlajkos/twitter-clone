<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store()
    {

        $data = request()->validate(
            [
                'body' => ['required', 'min:2', 'max:255']
            ]
        );

        $data['user_id'] = request()->user()->id;

        Post::create($data);


    }
}