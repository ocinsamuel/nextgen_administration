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
        
    }

    public function edit (Request $request) {

    }

    public function fetch() {
        $json_data = json_encode(DB::table('branch')->where('status',1)->get());

        return $json_data;
    }
}
