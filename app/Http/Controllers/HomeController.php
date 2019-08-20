<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use QrCode;

class HomeController extends Controller
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
        $data = DB::select('
                            SELECT @n := @n + 1 rownumber, attendance_user.name as user_name, attendance_user.phone as user_phone, attendance_user.kaj as user_kaj, attendance_user.email as user_email, t.name as event_name, t.date as event_date, attend_date
                            FROM (SELECT @n := 0) m, attendance
                            INNER JOIN 
                            (SELECT event_date.date, event.name, event_date.id as event_unique_id FROM event_date INNER JOIN event ON event_date.event_id = event.id WHERE event.status = 1) as t 
                            ON t.event_unique_id = attendance.event_date_id
                            INNER JOIN attendance_user 
                            ON attendance_user.id = attendance.attendance_user_id
                            ');
        // return $data;
        return view('home', ['active'=>'dashboard', 'data' => json_encode($data)]);
    }

    public function generateQRCode() {
        $activity = Input::get('activity');
        $date = Input::get('date');

        if ($date == '' || $date == null) {
            if ($activity == 1) {
                $date = date('Y-m-d H:i:s', strtotime('this saturday'));
            }
        } else {
            $date = date('Y-m-d H:i:s', strtotime($date));
        }
        $findExist = DB::table('event_date')->where([
                                                        ['event_id', '=', $activity],
                                                        ['date', '=', $date],
                                                    ])->first();

        if (!empty($findExist)) {
            $insertID = $findExist->id;
        } else {
            // STORE EVENT IN DB
            $insertID = DB::table('event_date')->insertGetId(
                                            ['event_id' => $activity,
                                             'date' => $date,
                                             'created_at' => date('Y-m-d H:i:s', strtotime('now'))
                                            ] );
        }

        $combine = $activity.';'.$date.';'.$insertID;
        // $encrypted = route('home').'/attendance/'.Crypt::encryptString($combine);
        $encrypted = 'http://192.168.1.102/nextgen_administration/public/attendance/'.Crypt::encryptString($combine);
        // return $encrypted;
        $pngImg = QrCode::format('png')->size(800)->errorCorrection('H')->generate($encrypted);
        // TODO: STORE QRCODE IMG
        // $image_resize = Image::make($pngImg);
        // $image_resize->save(public_path('img/qrcodes/' . $combine .'.png'));

        // $dir = '/images/qrcodes/'.$addPhoto;


        DB::table('event_date')->where('id',$insertID)->update([
                                                                // 'qr_code' => $dir,
                                                                'updated_at' => date('Y-m-d H:i:s', strtotime('now'))
                                                                ]);

        // return 'http://localhost/sat1012/public/attendance/'.$encrypted;
        return response($pngImg)->header('Content-type','image/png');
        
    }
}
