<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;
class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                'name' => 'น.1.1',
            ],
            [
                'name' => 'น.1.2',
            ],
            [
                'name' => 'น.2.1',
            ],
            [
                'name' => 'น.2.2',
            ],
            [
                'name' => 'น.3.1',
            ],
            [
                'name' => 'น.3.2',
            ],
            [
                'name' => 'น.4.1(3.3)',
            ],
            [
                'name' => 'น.4.2(2.3)',
            ],
            [
                'name' => 'น.2.3',
            ],
            [
                'name' => 'น.3.3',
            ],
            [
                'name' => 'N/A',
            ],
        ];
        Area::insert($areas);
    }
}
