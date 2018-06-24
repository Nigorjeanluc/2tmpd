<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallerie;
use App\Album;
use App\Event;
use App\Message;
use App\Upcoming;
use App\Video;
use App\Song;
use Mail;
use DB;
use Purifier;

class PagesController extends Controller
{
    public function getIndex(){
        $footer = DB::select('select id,other_images from events order by id desc limit 5');
        $event = DB::table('events')->orderBy('id', 'desc')->limit(3)->get();
        $first = DB::select('select * from events order by id desc limit 0,1');
        $other = DB::select('select * from events order by id desc limit 1,2');
        $events = DB::table('upcomings')->orderBy('id', 'desc')->limit(1)->get();
        $video1 = DB::table('videos')->orderBy('id', 'desc')->limit(1)->get();
        $video = DB::table('videos')->orderBy('id', 'desc')->limit(3)->get();
        $album = DB::table('albums')->orderBy('id', 'desc')->limit(1)->get();
        $song = DB::table('songs')->orderBy('id', 'desc')->limit(1)->get();
        return view('pages.index')->withEvents($event)->withFirsts($first)->withOthers($other)->withVideos($video)->withVideos1($video1)->withAlbums($album)->withSongs($song)->withEventss($events)->withFooters($footer);
    }

    public function getBio(){
        $footer = DB::select('select id,other_images from events order by id desc limit 5');
        $events = DB::table('events')->orderBy('id', 'desc')->limit(1)->get();
        return view('pages.biography')->withFooters($footer)->withEventss($events);
    }

    
    public function getDisco(){
        $footer = DB::select('select id,other_images from events order by id desc limit 5');
        $album = DB::table('albums')->orderBy('id', 'desc')->limit(2)->get();
        $event = DB::table('events')->orderBy('id', 'desc')->limit(3)->get();
        return view('pages.discography')->withAlbums($album)->withEvents($event)->withFooters($footer);
    }

    public function getCharity(){
        $footer = DB::select('select id,other_images from events order by id desc limit 5');
        $events = DB::table('events')->orderBy('id', 'desc')->limit(1)->get();
        return view('pages.charity')->withFooters($footer)->withEventss($events);
    }

    public function getGallery(){
        $footer = DB::select('select id,other_images from events order by id desc limit 5');
        $first = DB::table('galleries')->where('scale', '=', 'portrait')->orderBy('id', 'desc')->take(1)->get();
        $other = DB::table('galleries')->where('scale', '=', 'landscape')->orderBy('id', 'desc')->take(1)->get();
        $and = DB::table('galleries')->where('scale', '=', 'landscape')->orderBy('id', 'desc')->skip(1)->take(1)->get();

        $first1 = DB::table('galleries')->where('scale', '=', 'portrait')->orderBy('id', 'desc')->skip(1)->take(1)->get();
        $other1 = DB::table('galleries')->where('scale', '=', 'landscape')->orderBy('id', 'desc')->skip(2)->take(1)->get();
        $and1 = DB::table('galleries')->where('scale', '=', 'landscape')->orderBy('id', 'desc')->skip(3)->take(1)->get();

        $first2 = DB::table('galleries')->where('scale', '=', 'portrait')->orderBy('id', 'desc')->skip(2)->take(1)->get();
        $other2 = DB::table('galleries')->where('scale', '=', 'landscape')->orderBy('id', 'desc')->skip(4)->take(1)->get();
        $and2 = DB::table('galleries')->where('scale', '=', 'landscape')->orderBy('id', 'desc')->skip(5)->take(1)->get();
        return view('pages.gallery')->withFirsts($first)->withOthers($other)->withAnds($and)->withFirsts1($first1)->withOthers1($other1)->withAnds1($and1)->withFirsts2($first2)->withOthers2($other2)->withAnds2($and2)->withFooters($footer);
    }

    public function getContactUs(){
        $footer = DB::select('select id,other_images from events order by id desc limit 5');
        return view('pages.contact_us')->withFooters($footer);
    }

    public function postContactUs(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'min:10'
        ]);

        $contact = New Message;
        
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = Purifier::clean($request->message);

        $contact->save();

       /*Mail::send('auth.emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('hello@jayjay.com');
            $message->subject($data['subject']);
        });*/

        $request->session()->flash('success', 'Message sent');

        return redirect()->route('contactUs');
    }

    public function getSingle($id) {
        $pos = Event::find($id);
        $footer = DB::select('select id,other_images from events order by id desc limit 5');
        return view('pages.single')->withPos($pos)->withFooters($footer);
    }

    public function getVideo($id) {
        $vids = DB::table('videos')->where('id', '=', $id)->orderBy('id', 'desc')->first();
        $footer = DB::select('select id,other_images from events order by id desc limit 5');
        return view('pages.video')->withVids($vids)->withFooters($footer);
    }

    public function getSong($id) {
        $songs = DB::table('songs')->where('id', '=', $id)->orderBy('id', 'desc')->first();
        $footer = DB::select('select id,other_images from events order by id desc limit 5');
        return view('pages.song')->withSong($songs)->withFooters($footer);
    }
}
