<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\problemSolution;
class problemSolutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $problemSolutions = [
            [
                'workStatus' => 'ติดตั้งสำเร็จ',
            ],
            [
                'workStatus' => 'ลูกค้าเลื่อนหน้างาน',
            ],
            [
                'workStatus' => 'นิติฯไม่อนุญาต',
            ],
            [
                'workStatus' => 'ติดปัญหาหน้างาน',
            ],
            [
                'workStatus' => 'อื่นๆ โปรดระบุในรีมาร์ค',
            ],
        ];
        problemSolution::insert($problemSolutions);
    }
}
