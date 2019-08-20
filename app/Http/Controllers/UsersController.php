<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
// use QrCode;
// use Storage;
// use Image;

class UsersController extends Controller
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
        return view('user.leader');
    }

    public function indexLeader()
    {
        // $json_data = json_encode(DB::table('attendance_user')->where('position_id','!=','3')->get());
        $json_data = json_encode(DB::select('SELECT @n := @n + 1 rownumber,attendance_user.* FROM (SELECT @n := 0) m, attendance_user WHERE position_id = 1'));
        // return $json_data;
        return view('user.leader', ['data' => $json_data, 'active' => 'leader']);
    }

    public function indexPengerja()
    {
        // $json_data = json_encode(DB::table('attendance_user')->where('position_id','3')->get());
        $json_data = json_encode(DB::select('SELECT @n := @n + 1 rownumber,attendance_user.* FROM (SELECT @n := 0) m, attendance_user WHERE position_id = 2'));
        // return $json_data;
        return view('user.leader', ['data' => $json_data, 'active' => 'pengerja']);
    }

    public function indexJemaat()
    {
        // $json_data = json_encode(DB::table('attendance_user')->where('position_id','3')->get());
        $json_data = json_encode(DB::select('SELECT @n := @n + 1 rownumber,attendance_user.* FROM (SELECT @n := 0) m, attendance_user WHERE position_id = 3'));
        // return $json_data;
        return view('user.leader', ['data' => $json_data, 'active' => 'jemaat']);
    }

    public function addUser(Request $request) {
        $name = strip_tags($request->input('name'));
        $email = strip_tags($request->input('email'));
        $phone = strip_tags($request->input('phone'));
        $kaj = strip_tags($request->input('kaj'));
        $position = strip_tags($request->input('position'));
        $password = hash($this->password_hash_algo, "123456");
        $status = 2;
        $created_at = date('Y-m-d H:i:s', strtotime('now'));

        $checkuser = DB::table('attendance_user')->where('email',$email)
                                                 ->orWhere('phone', $phone)
                                                 ->orWhere('kaj', $kaj)->first();

        if (!$checkuser) {

            $insertID = DB::table('attendance_user')->insertGetId([
                                                                    'name'=>$name,
                                                                    'phone'=>$phone,
                                                                    'email'=>$email,
                                                                    'kaj'=>$kaj,
                                                                    'position_id'=>$position,
                                                                    'password'=>$password,
                                                                    'status'=>$status,
                                                                    'created_at'=>$created_at
                                                                  ]);

            if ($insertID) {
                if ($position == 3) {
                    return redirect('/user/jemaat')->with('addUser', array('status' => 1, 'message' => 'User added successfully.'));
                } else if ($position == 2) {
                    return redirect('/user/pengerja')->with('addUser', array('status' => 1, 'message' => 'User added successfully.'));
                } else {
                    return redirect('/user/leader')->with('addUser', array('status' => 1, 'message' => 'User added successfully.'));
                }
            } else {
                if ($position == 3) {
                    return redirect('/user/jemaat')->with('addUser', array('status' => 0, 'message' => 'Unexpected error occured!'));
                } else if ($position == 2) {
                    return redirect('/user/pengerja')->with('addUser', array('status' => 0, 'message' => 'Unexpected error occured!'));
                } else {
                    return redirect('/user/leader')->with('addUser', array('status' => 0, 'message' => 'Unexpected error occured!'));
                }
            }
        } else {
            if ($position == 3) {
                return redirect('/user/jemaat')->with('addUser', array('status' => 0, 'message' => 'User already exists!'));
            } else if ($position == 2) {
                return redirect('/user/pengerja')->with('addUser', array('status' => 0, 'message' => 'User already exists!'));
            } else {
                return redirect('/user/leader')->with('addUser', array('status' => 0, 'message' => 'User already exists!'));
            }
        }
    }

    public function editUser (Request $request) {
        $id = strip_tags($request->input('id'));
        $name = strip_tags($request->input('name'));
        $email = strip_tags($request->input('email'));
        $phone = strip_tags($request->input('phone'));
        $kaj = strip_tags($request->input('kaj'));
        $position = strip_tags($request->input('position'));
        $status = strip_tags($request->input('status'));

        $checkuser = DB::table('attendance_user')->where('id',$id)->first();
        $position_first = $checkuser->position_id;

        if ($checkuser) {

            $update = DB::table('attendance_user')->where('id',$id)->update([
                                                            'name'=>$name,
                                                            'phone'=>$phone,
                                                            'email'=>$email,
                                                            'kaj'=>$kaj,
                                                            'position_id'=>$position,
                                                            'status'=>$status
                                                           ]);

            if ($position_first == 3) {
                return redirect('/user/jemaat')->with('addUser', array('status' => 1, 'message' => 'User edited successfully.'));
            } else if ($position_first == 2) {
                return redirect('/user/pengerja')->with('addUser', array('status' => 1, 'message' => 'User edited successfully.'));
            } else {
                return redirect('/user/leader')->with('addUser', array('status' => 1, 'message' => 'User edited successfully.'));
            }
        } else {
            if ($position_first == 3) {
                return redirect('/user/jemaat')->with('addUser', array('status' => 0, 'message' => 'User not found!'));
            } else if ($position_first == 2) {
                return redirect('/user/pengerja')->with('addUser', array('status' => 0, 'message' => 'User not found!'));
            } else {
                return redirect('/user/leader')->with('addUser', array('status' => 0, 'message' => 'User not found!'));
            }
        }
    }
}
