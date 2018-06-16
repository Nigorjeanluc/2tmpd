<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Purifier;
use Session;
use Image;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userpages.index');
    }

    public function getGallery()
    {
        return view('userpages.gallery');
    }

    public function getMessages()
    {
        $messages = Message::orderBy('id', 'asc')->paginate(5);
        return view('userpages.messages')->withPosts($messages);
    }

    public function getAlbums(){
        return view('userpages.albums');
    }
    public function getEvents(){
        return view('userpages.events');
    }
    public function getVideos(){
        return view('userpages.videos');
    }
}
