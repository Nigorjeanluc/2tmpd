<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upcoming;
use Purifier;
use Session;
use Image;
use Storage;

class upcomingController extends Controller
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
        $upcomings = Upcoming::orderBy('id', 'asc')->paginate(5);
        return view('userpages.upcomings.index')->withPosts($upcomings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('userpages.upcomings');
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
            'other_images' => 'sometimes|image',
            'venue'          => 'required|max:255'
        ));

        $upcoming = new Upcoming;

        $upcoming->title = $request->title;

        //save our image
        if($request->hasFile('other_images')) {
            $image = $request->file('other_images');
            $filename = time()+3600 . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image)->resize(640, 427)->save($location);

            $upcoming->other_images = $filename;
        }
        $upcoming->venue = $request->venue;
        $upcoming->content = Purifier::clean($request->content);

        $upcoming->save();
        
        $request->session()->flash('success', 'The upcoming post was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('upcoming.show', $upcoming->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $upcoming = Upcoming::find($id);
        return view('userpages.upcomings.show')->withPost($upcoming);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $upcoming = Upcoming::find($id);
        return view('userpages.upcomings.edit')->withPost($upcoming);
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
        $upcoming = Upcoming::find($id);
        
        // validate the data
        $this->validate($request, array(
            'title'          => 'required|max:255',
            'other_images' => 'sometimes|image',
            'venue'          => 'required|max:255'
        ));

        $upcoming->title = $request->title;
        //save our image
        if ($request->hasFile('other_images')) {
            // add the new photo
            $image = $request->file('other_images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(640, 427)->save($location);
            //$image->move($location, $filename);
            $oldFilename = $upcoming->other_images;
            // update the database
            $upcoming->other_images = $filename;
            // Delete the old photo
            Storage::delete($oldFilename);
        }
        $upcoming->venue = $request->venue;
        $upcoming->content = Purifier::clean($request->content);

        $upcoming->save();
        
        $request->session()->flash('success', 'The upcoming post was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('upcoming.show', $upcoming->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upcoming = Upcoming::find($id);
        Storage::delete($upcoming->other_images);

        $upcoming->delete();

        
        Session::flash('success', 'The upcoming was successfully deleted.');
        

        return redirect()->route('upcoming.index');
    }
}
