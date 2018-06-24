<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Purifier;
use Session;
use Image;
use Storage;

class EventController extends Controller
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
        $events = Event::orderBy('id', 'asc')->paginate(5);
        return view('userpages.events.index')->withPosts($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('userpages.events');
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
            'header_images' => 'sometimes|image',
            'other_images' => 'sometimes|image',
            'venue'          => 'required|max:255'
        ));

        $event = new Event;

        $event->title = $request->title;
        //save our image
        if($request->hasFile('header_images')) {
            $image = $request->file('header_images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image)->resize(480, 640)->save($location);

            $event->header_images = $filename;
        }

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

            $event->other_images = $filename;
        }
        $event->venue = $request->venue;
        $event->content = Purifier::clean($request->content);

        $event->save();
        
        $request->session()->flash('success', 'The event post was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('events.show', $event->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('userpages.events.show')->withPost($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('userpages.events.edit')->withPost($event);
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
        $event = Event::find($id);
        
        // validate the data
        $this->validate($request, array(
            'title'          => 'required|max:255',
            'header_images' => 'sometimes|image',
            'other_images' => 'sometimes|image',
            'venue'          => 'required|max:255'
        ));

        $event->title = $request->title;
        //save our image
       //save our image
       if ($request->hasFile('header_images')) {
            // add the new photo
            $image = $request->file('header_images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(480, 640)->save($location);
            //$image->move($location, $filename);
            $oldFilename = $event->header_images;
            // update the database
            $event->header_images = $filename;
            // Delete the old photo
            Storage::delete($oldFilename);
        }

        if ($request->hasFile('other_images')) {
            // add the new photo
            $image = $request->file('other_images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(640, 427)->save($location);
            //$image->move($location, $filename);
            $oldFilename = $event->other_images;
            // update the database
            $event->other_images = $filename;
            // Delete the old photo
            Storage::delete($oldFilename);
        }
        $event->venue = $request->venue;
        $event->content = Purifier::clean($request->content);

        $event->save();
        
        $request->session()->flash('success', 'The event post was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('events.show', $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        Storage::delete($event->other_images);
        Storage::delete($event->header_images);

        $event->delete();

        
        Session::flash('success', 'The event was successfully deleted.');
        

        return redirect()->route('events.index');
    }
}
