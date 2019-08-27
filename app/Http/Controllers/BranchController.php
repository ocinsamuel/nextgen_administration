<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class BranchController extends Controller
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
        $json_data = json_encode(DB::select('SELECT @n := @n + 1 rownumber,branch.* FROM (SELECT @n := 0) m, branch WHERE status != 0'));
        return view('branch.branch', ['data' => $json_data, 'active' => 'branch']);
    }

    public function add(Request $request) {
        $name = strip_tags($request->input('name'));
        $status = 2;
        $created_at = date('Y-m-d H:i:s', strtotime('now'));

        $check = DB::table('branch')->where('name',$name)->first();

        if (!$check) {

            $insertID = DB::table('branch')->insertGetId([
                                                            'name'=>$name,
                                                            'status'=>$status,
                                                            'created_at'=>$created_at
                                                        ]);

            if ($insertID) {
                return redirect('/branch')->with('addBranch', array('status' => 1, 'message' => 'Branch added successfully.'));
            } else {
                return redirect('/branch')->with('addBranch', array('status' => 0, 'message' => 'Unexpected error occured!'));
            }
        } else {
            return redirect('/branch')->with('addBranch', array('status' => 0, 'message' => 'Branch already exists!'));
        }
    }

    public function edit(Request $request) {
        $id = strip_tags($request->input('id'));
        $name = strip_tags($request->input('name'));
        $status = strip_tags($request->input('status'));

        $check = DB::table('branch')->where('id',$id)->first();

        if ($check) {

            $update = DB::table('branch')->where('id',$id)->update([
                                                            'name'=>$name,
                                                            'status'=>$status
                                                           ]);

            return redirect('/branch')->with('addBranch', array('status' => 1, 'message' => 'Branch edited successfully.'));
        } else {
            return redirect('/branch')->with('addBranch', array('status' => 0, 'message' => 'Branch not found!'));
        }
    }

    public function fetch() {
        $json_data = json_encode(DB::table('branch')->where('status',1)->get());

        return $json_data;
    }
}
