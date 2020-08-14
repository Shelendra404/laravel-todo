<?php

namespace App\Http\Controllers;

class PostsController extends Controllers
{
    public function show($slug)
    {
        $post = \DB::table('posts')->where('slug', $slug)->first();
        dd($post);
    }
}
