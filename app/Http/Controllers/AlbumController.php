<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use Purifier;
use Session;
use Image;
use Storage;

class AlbumController extends Controller
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
        $albums = Album::orderBy('id', 'desc')->paginate(2);
        return view('userpages.albums.index')->withPosts($albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userpages.albums');
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
            'name'          => 'required|max:255',
            'cover' => 'sometimes|image'
        ));

        $album = new Album;

        $album->name = $request->name;
        //save our image
        if($request->hasFile('cover')) {
            $image = $request->file('cover');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image)->resize(400, 400)->save($location);

            $album->cover = $filename;
        }
        $album->content = Purifier::clean($request->content);

        $album->save();
        
        $request->session()->flash('success', 'The event post was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('albums.show', $album->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);
        return view('userpages.albums.show')->withPost($album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $album = Album::find($id);
        return view('userpages.albums.edit')->withPost($album);
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
        $album = Album::find($id);
        
        // validate the data
        $this->validate($request, array(
            'name'          => 'required|max:255',
            'cover' => 'sometimes|image'
        ));

        $album->name = $request->name;
        //save our image
        if ($request->hasFile('cover')) {
            // add the new photo
            $image = $request->file('cover');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(400, 400)->save($location);
            //$image->move($location, $filename);
            $oldFilename = $album->cover;
            // update the database
            $album->cover = $filename;
            // Delete the old photo
            Storage::delete($oldFilename);
        }
        $album->content = Purifier::clean($request->content);

        $album->save();
        
        $request->session()->flash('success', 'The event post was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('albums.show', $album->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        Storage::delete($album->cover);

        $album->delete();

        
        Session::flash('success', 'The album was successfully deleted.');
        

        return redirect()->route('albums.index');
    }
}
