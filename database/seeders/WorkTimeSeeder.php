<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Worktime;

class WorkTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $WorkTimes = [
            [
                'workTime' => 'จันทร์ - ศุกร์ (9.00 - 17.00 น)',
            ],
            [
                'workTime' => 'จันทร์ - เสาร์ (9.00 - 17.00 น)',
            ],
            [
                'workTime' => 'จันทร์ - ศุกร์ และเสาร์ครึ่งวันช่วงเช้า',
            ],
            [
                'workTime' => 'จันทร์ - ศุกร์ และเสาร์ครึ่งวันช่วงบ่าย',
            ],
            [
                'workTime' => 'จันทร์ - ศุกร์ และวันเสาร์ ประสาน นิติฯ ก่อน',
            ],
            [
                'workTime' => 'จันทร์ - ศุกร์ และวันเสาร์-อาทิตย์ ประสาน นิติฯ ก่อน',
            ],
            [
                'workTime' => 'ทุกวัน',
            ],
            [
                'workTime' => 'จันทร์ - ศุกร์ และวันเสาร์-อาทิตย์ ประสาน นิติฯ ก่อน'
            ],
            [
                'workTime' => 'จันทร์ - ศุกร์ (เสาร์ครึ่งวันช่วงบ่าย)'
            ],
            [
                'workTime' => 'จันทร์ - ศุกร์ (เสาร์ครึ่งวัน)'
            ],
            [
                'workTime' => 'จันทร์ - ศุกร์ (9.00 - 15.00 น)'
            ],
            [
                'workTime' => 'เสาร์ หลัง13.00 เป็นต้นไป'
            ],
            [
                'workTime' => 'นักขัตฤกษ์ห้ามเข้า'
            ],
            [
                'workTime' => 'จันทร์ - เสาร์ (13.00 - 17.00 น)'
            ],
            [
                'workTime' => 'จันทร์,อังคาร,พฤหัส,ศุกร์,อาทิตย์ (9.00 - 17.00 น)'
            ],
        ];
        Worktime::insert($WorkTimes);
    }
}
