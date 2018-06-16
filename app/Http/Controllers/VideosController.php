<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use Purifier;
use Session;
use Image;
use Storage;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('auth');
    }

    public function index()
    {
        $videos = Video::orderBy('id', 'asc')->paginate(5);
        return view('userpages.videos.index')->withPosts($videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userpages.videos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'title'          => 'required|max:255',
            'img' => 'sometimes|image',
            'youtube_link'          => 'required|max:255'
        ));

        $video = new Video;

        $video->title = $request->title;
        //save our image
        if($request->hasFile('img')) {
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image)->resize(640, 427)->save($location);

            $video->img = $filename;
        }
        $video->youtube_link = $request->youtube_link;

        $video->save();
        
        $request->session()->flash('success', 'The video was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('videos.show', $video->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        return view('userpages.videos.show')->withPost($video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        return view('userpages.videos.edit')->withPost($video);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Video::find($id);
        
        // validate the data
        $this->validate($request, array(
            'title'          => 'required|max:255',
            'img' => 'sometimes|image',
            'youtube_link'          => 'required|max:255'
        ));

        $video->title = $request->title;
        //save our image
       //save our image
       if ($request->hasFile('img')) {
            // add the new photo
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(1366, 768)->save($location);
            //$image->move($location, $filename);
            $oldFilename = $video->img;
            // update the database
            $video->img = $filename;
            // Delete the old photo
            Storage::delete($oldFilename);
        }

        $video->youtube_link = $request->youtube_link;

        $video->save();
        
        $request->session()->flash('success', 'The video was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('videos.show', $video->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        Storage::delete($video->other_images);
        Storage::delete($video->header_images);

        $video->delete();

        
        Session::flash('success', 'The video was successfully deleted.');
        

        return redirect()->route('videos.index');
    }
}
