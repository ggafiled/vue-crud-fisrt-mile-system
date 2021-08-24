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
        ];
        Worktime::insert($WorkTimes);
    }
}
