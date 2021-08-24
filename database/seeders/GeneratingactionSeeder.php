<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Generatingaction;
class GeneratingactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Generatingactions = [
            [
                'status' => 'รอเข้า Survey',
            ],
            [
                'status' => 'รอเข้าดำเนินการ',
            ],
            [
                'status' => 'กำลังดำเนินการ',
            ],
            [
                'status' => 'ดำเนิการแล้วเสร็จ',
            ],
            [
                'status' => 'วางโครงข่ายแล้ว',
            ],
            [
                'status' => 'กำลังสร้างพร้อมโครงการฯ',
            ],
            [
                'status' => 'เชื่อมโครงข่ายแล้ว',
            ],
        ];
        Generatingaction::insert($Generatingactions);
    }
}
