<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallerie;
use Purifier;
use Session;
use Image;
use Storage;

class GalleryController extends Controller
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
        $galleries = Gallerie::orderBy('id', 'asc')->paginate(5);
        return view('userpages.galleries.index')->withPosts($galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userpages.gallery');
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
            'img' => 'sometimes|image'
        ));

        $gallery = new Gallerie;

        $gallery->title = $request->title;
        $gallery->scale = $request->img_format;
        //save our image
        if($request->hasFile('img')) {
            if($request->img_format == 'portrait'){
                $image = $request->file('img');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                //or $filename = time() . '.' . $image->encode('png');
                //$location = public_path('images/news/');
                //or $location = storage_path('/app/posts/');
                //$image->move($location, $filename);
                Image::make($image)->resize(480, 640)->save($location);
    
                $gallery->img = $filename;
            }

            if($request->img_format == 'landscape'){
                $image = $request->file('img');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                //or $filename = time() . '.' . $image->encode('png');
                //$location = public_path('images/news/');
                //or $location = storage_path('/app/posts/');
                //$image->move($location, $filename);
                Image::make($image)->resize(640, 427)->save($location);
    
                $gallery->img = $filename;
            }
        }

        
        $gallery->detail = Purifier::clean($request->detail);

        $gallery->save();
        
        $request->session()->flash('success', 'The image was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('imgs.show', $gallery->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallerie::find($id);
        return view('userpages.galleries.show')->withPost($gallery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallerie::find($id);
        return view('userpages.galleries.edit')->withPost($gallery);
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
        $gallery = Gallerie::find($id);
        
        // validate the data
        $this->validate($request, array(
            'title'          => 'required|max:255',
            'img' => 'sometimes|image'
        ));

        $gallery->title = $request->title;
        $gallery->scale = $request->img_format;
        //save our image
        if ($request->hasFile('img')) {
            if($request->img_format == 'portrait'){
                // add the new photo
                $image = $request->file('img');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->resize(480, 640)->save($location);
                //$image->move($location, $filename);
                $oldFilename = $gallery->img;
                // update the database
                $gallery->img = $filename;
                // Delete the old photo
                Storage::delete($oldFilename);
            }

            if($request->img_format == 'landscape'){
                // add the new photo
                $image = $request->file('img');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->resize(640, 427)->save($location);
                //$image->move($location, $filename);
                $oldFilename = $gallery->img;
                // update the database
                $gallery->img = $filename;
                // Delete the old photo
                Storage::delete($oldFilename);
            }
            
        }
        
        $gallery->detail = Purifier::clean($request->detail);

        $gallery->save();
        
        $request->session()->flash('success', 'The video was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('imgs.show', $gallery->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallerie::find($id);
        Storage::delete($gallery->img);

        $gallery->delete();

        
        Session::flash('success', 'The video was successfully deleted.');
        

        return redirect()->route('imgs.index');
    }
}
