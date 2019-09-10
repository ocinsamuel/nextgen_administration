<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class HomeTableExportWorker implements FromCollection, WithHeadings
{
    use Exportable;
    
    public function collection()
    {
        $data = DB::select('
                            SELECT attendance_user.name as user_name, attendance_user.phone as user_phone, t.branch_name as branch_name, case attendance_user.position_id when "1" then "Leader" when "2" then "Pengerja" when "3" then "Jemaat" end as position, t.name as event_name, t.date as event_date, attend_date
                            FROM attendance
                            INNER JOIN 
                            (SELECT event.branch_id as branch_id, branch.name as branch_name, event_date.date, event.name, event_date.id as event_unique_id FROM event_date INNER JOIN event ON event_date.event_id = event.id INNER JOIN branch ON event.branch_id = branch.id WHERE event.status = 1 AND branch.status = 1) as t 
                            ON t.event_unique_id = attendance.event_date_id
                            INNER JOIN attendance_user 
                            ON attendance_user.id = attendance.attendance_user_id
                            WHERE attendance_user.position_id != 3
                            ORDER BY attendance.id DESC
                            ');

        return collect($data);
    }

     public function headings(): array
    {
        return [
            'Name',
            'Phone',
            'Branch',
            'Position',
            'Event Name',
            'Event Date',
            'Attend Date'
        ];
    }
}

?>