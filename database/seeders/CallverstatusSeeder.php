<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Callverstatus;
class CallverstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Callverstatuses = [
            [
                'callVerStatus' => 'ส่งทีมช่างเข้าดำเนินการ',
            ],
            [
                'callVerStatus' => 'ไม่สามารถติดต่อได้ ',
            ],
            [
                'callVerStatus' => 'ข้อมูลไม่ถูกต้อง',
            ],
            [
                'callVerStatus' => 'เลื่อนนัดหมาย',
            ],
            [
                'callVerStatus' => 'ยกเลิกการติดตั้ง',
            ],
        ];
        Callverstatus::insert($Callverstatuses);
    }
}
