<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bbn;
class BbnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bbns = [
            [
                'name' => 'บบน.1.1.1',
                'area_id' => '1',
            ],
            [
                'name' => 'บบน.1.1.2',
                'area_id' => '1',
            ],
            [
                'name' => 'บบน.1.1.3',
                'area_id' => '1',
            ],

            [
                'name' => 'บบน.1.2.1',
                'area_id' => '2',
            ],
            [
                'name' => 'บบน.1.1.2',
                'area_id' => '2',
            ],
            [
                'name' => 'บบน.1.1.3',
                'area_id' => '2',
            ],

            [
                'name' => 'บบน.2.1.1',
                'area_id' => '3',
            ],
            [
                'name' => 'บบน.2.1.2',
                'area_id' => '3',
            ],
            [
                'name' => 'บบน.2.1.3',
                'area_id' => '3',
            ],

            [
                'name' => 'บบน.2.2.1',
                'area_id' => '4',
            ],
            [
                'name' => 'บบน.2.2.2',
                'area_id' => '4',
            ],
            [
                'name' => 'บบน.2.2.3',
                'area_id' => '4',
            ],

            [
                'name' => 'บบน.3.1.1',
                'area_id' => '5',
            ],
            [
                'name' => 'บบน.3.1.2',
                'area_id' => '5',
            ],
            [
                'name' => 'บบน.3.1.3',
                'area_id' => '5',
            ],

            [
                'name' => 'บบน.3.2.1',
                'area_id' => '6',
            ],
            [
                'name' => 'บบน.3.2.2',
                'area_id' => '6',
            ],
            [
                'name' => 'บบน.3.2.3',
                'area_id' => '6',
            ],

            [
                'name' => 'บบน.4.1.1',
                'area_id' => '7',
            ],
            [
                'name' => 'บบน.4.1.2',
                'area_id' => '7',
            ],
            [
                'name' => 'บบน.4.1.3',
                'area_id' => '7',
            ],

            [
                'name' => 'บบน.4.2.1',
                'area_id' => '8',
            ],
            [
                'name' => 'บบน.4.5.2',
                'area_id' => '8',
            ],
            [
                'name' => 'บบน.4.5.3',
                'area_id' => '8',
            ],

            [
                'name' => 'บบน.2.3.1',
                'area_id' => '9',
            ],
            [
                'name' => 'บบน.2.3.2',
                'area_id' => '9',
            ],
            [
                'name' => 'บบน.2.3.3',
                'area_id' => '9',
            ],

            [
                'name' => 'บบน.3.3.1',
                'area_id' => '10',
            ],
            [
                'name' => 'บบน.3.3.2',
                'area_id' => '10',
            ],
            [
                'name' => 'บบน.3.3.3',
                'area_id' => '10',
            ],
            [
                'name' => 'N/A',
                'area_id' => '11',
            ],
        ];
        Bbn::insert($bbns);
    }
}
