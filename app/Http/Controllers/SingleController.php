<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use DB;

class SingleController extends Controller
{
    public function getSingle($slug) {
        DB::table('posts')->where('slug', $slug)->increment('views');
        $post = Post::where('slug', '=', $slug)->first();
        $sames = DB::table('posts')->where('sport_id', '=', $post->sport_id)->orWhere('location_id', '=', $post->location_id)->limit(3)->get();
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        return view('pages.single')->withPost($post)->withAsides($aside)->withNewones($newone)->withSames($sames);
    }
}