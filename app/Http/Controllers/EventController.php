<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
// use QrCode;
// use Storage;
// use Image;

class EventController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $json_data = json_encode(DB::table('event')->get());
        $json_data = json_encode(DB::select('SELECT @n := @n + 1 rownumber,event.* FROM (SELECT @n := 0) m, event WHERE status != 0'));
        return view('event.event', ['data' => $json_data, 'active' => 'event']);
    }

    public function add(Request $request) {
        $name = strip_tags($request->input('name'));
        $status = 2;
        $created_at = date('Y-m-d H:i:s', strtotime('now'));

        $check = DB::table('event')->where('name',$name)->first();

        if (!$check) {

            $insertID = DB::table('event')->insertGetId([
                                                            'name'=>$name,
                                                            'status'=>$status,
                                                            'created_at'=>$created_at
                                                        ]);

            if ($insertID) {
                return redirect('/event')->with('addEvent', array('status' => 1, 'message' => 'Event added successfully.'));
            } else {
                return redirect('/event')->with('addEvent', array('status' => 0, 'message' => 'Unexpected error occured!'));
            }
        } else {
            return redirect('/event')->with('addEvent', array('status' => 0, 'message' => 'Event already exists!'));
        }
    }

    public function edit (Request $request) {
        $id = strip_tags($request->input('id'));
        $name = strip_tags($request->input('name'));
        $status = strip_tags($request->input('status'));

        $check = DB::table('event')->where('id',$id)->first();

        if ($check) {

            $update = DB::table('event')->where('id',$id)->update([
                                                            'name'=>$name,
                                                            'status'=>$status
                                                           ]);

            return redirect('/event')->with('addEvent', array('status' => 1, 'message' => 'Event edited successfully.'));
        } else {
            return redirect('/event')->with('addEvent', array('status' => 0, 'message' => 'Event not found!'));
        }
    }

    public function dates($id) {
        $dates = DB::select("SELECT * FROM event INNER JOIN event_date ON event.id = event_date.event_id WHERE event_date.event_id = $id ORDER BY event_date.date DESC");

        return json_encode($dates);
    }

    public function fetch() {
        $json_data = json_encode(DB::table('event')->where('status',1)->get());

        return $json_data;
    }
}
