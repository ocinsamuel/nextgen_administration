<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use QrCode;

class AttendanceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('attendance');
    }

    public function readURL($url) {
        $decrypt = Crypt::decryptString($url);

        return view('attendance',['actdate' => $decrypt, 'status' => 0]);
    }

    public function attend( Request $request ) {
        $actdate = strip_tags($request->input('actdate'));
        $username = strip_tags($request->input('username'));
        $password = Crypt::encryptString(strip_tags($request->input('password')));
        $currDate = date('Y-m-d H:i:s' , strtotime('now'));

        $user = DB::table('attendance_user')->where('email',$username)
                                            ->orWhere('username', $username)
                                            ->orWhere('kaj', $username)->first();

        if (!empty($user)) {
            if ($password == $user->password) {
                $arrTemp = explode(';', $actdate);
                $insertID = DB::table('attendance')->insertGetId(
                                            ['attendance_user_id' => $user->id,
                                             'event_date_id' => $tempArr[2],
                                             'attend_date' => $currDate,
                                            ] );
                if ($insertID) {
                    return view('attendance',["status"=>1]);
                } else {
                    return view('attendance',["status"=>2]);
                }
            }
        } else {
            return view('attendance',["status"=>3]);
        }
    }

    public function fetchAttendanceByFilter($daterange, $filter = '0') {

        $where = array();

        if ($daterange != 'all') {
            $temp = explode('-', $daterange);
            if (count($temp) > 1) {
                $from = date("Y-m-d", strtotime($temp[0]));
                $to = date("Y-m-d", strtotime($temp[1]));
            } else {
                $from = date("Y-m-d", strtotime($temp[0]));
                $to = date("Y-m-d", strtotime($temp[0]));
            }

            $where[] = 't.date BETWEEN "'. $from . '" AND "' . $to . '"';
        }

        if ($filter != 0) {
            $where[] = 't.branch_id = ' .$filter;
        }

        if (!empty($where)) {
            if (count($where) > 1) {
                $filter = ' WHERE '.implode(' AND ', $where);
            } else {
                $filter = ' WHERE '.implode(' ', $where);
            }
        }

        $data = DB::select("
                            SELECT @n := @n + 1 rownumber, attendance_user.name as user_name, attendance_user.phone as user_phone, attendance_user.kaj as user_kaj, attendance_user.email as user_email, t.name as event_name, t.date as event_date, attend_date, attendance.id as at_id, t.branch_name as branch_name
                            FROM (SELECT @n := 0) m, attendance
                            INNER JOIN 
                            (SELECT event.branch_id as branch_id, branch.name as branch_name, event_date.date, event.name, event_date.id as event_unique_id FROM event_date INNER JOIN event ON event_date.event_id = event.id INNER JOIN branch ON event.branch_id = branch.id WHERE event.status = 1 AND branch.status = 1) as t 
                            ON t.event_unique_id = attendance.event_date_id
                            INNER JOIN attendance_user 
                            ON attendance_user.id = attendance.attendance_user_id
                            ".$filter."
                            ORDER BY t.date DESC, attend_date DESC;
                            ");

        return json_encode($data);
    }
}
