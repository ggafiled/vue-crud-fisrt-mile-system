<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problemsolution;
class ProblemSolutionsSeeder extends Seeder
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
                'problemSolution' => 'ติดตั้งสำเร็จ',
            ],
            [
                'problemSolution' => 'ลูกค้าเลื่อนหน้างาน',
            ],
            [
                'problemSolution' => 'นิติฯไม่อนุญาต',
            ],
            [
                'problemSolution' => 'ติดปัญหาหน้างาน',
            ],
            [
                'problemSolution' => 'อื่นๆ โปรดระบุในรีมาร์ค',
            ],
        ];
        Problemsolution::insert($problemSolutions);
    }
}
