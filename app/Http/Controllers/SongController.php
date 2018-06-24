<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use Purifier;
use Session;
use Image;
use Storage;

class SongController extends Controller
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
        $songs = Song::orderBy('id', 'asc')->paginate(5);
        return view('userpages.songs.index')->withPosts($songs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userpages.songs');
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

        $song = new Song;

        $song->title = $request->title;
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

            $song->img = $filename;
        }
        $song->youtube_link = $request->youtube_link;

        $song->save();
        
        $request->session()->flash('success', 'The song was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('songs.show', $song->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song = Song::find($id);
        return view('userpages.songs.show')->withPost($song);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Song::find($id);
        return view('userpages.songs.edit')->withPost($song);
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
        $song = Song::find($id);
        
        // validate the data
        $this->validate($request, array(
            'title'          => 'required|max:255',
            'img' => 'sometimes|image',
            'youtube_link'          => 'required|max:255'
        ));

        $song->title = $request->title;
        //save our image
       //save our image
       if ($request->hasFile('img')) {
            // add the new photo
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(640, 427)->save($location);
            //$image->move($location, $filename);
            $oldFilename = $song->img;
            // update the database
            $song->img = $filename;
            // Delete the old photo
            Storage::delete($oldFilename);
        }

        $song->youtube_link = $request->youtube_link;

        $song->save();
        
        $request->session()->flash('success', 'The song was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('songs.show', $song->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Song::find($id);
        Storage::delete($song->other_images);
        Storage::delete($song->header_images);

        $song->delete();

        
        Session::flash('success', 'The song was successfully deleted.');
        

        return redirect()->route('songs.index');
    }
}
