<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area3bb;
class Area3BBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Area3bbs = [
            [
                'Area3BB' => 'RO 1',
            ],
            [
                'Area3BB' => 'RO 2',
            ],
            [
                'Area3BB' => 'RO 3',
            ],
            [
                'Area3BB' => 'RO 4',
            ],
            [
                'Area3BB' => 'RO 5',
            ],
            [
                'Area3BB' => 'RO 6',
            ],
            [
                'Area3BB' => 'RO 7',
            ],
            [
                'Area3BB' => 'RO 8',
            ],
            [
                'Area3BB' => 'RO 9',
            ],
            [
                'Area3BB' => 'RO 10',
            ],
            [
                'Area3BB' => 'RO 10/1',
            ],
            [
                'Area3BB' => 'N/A',
            ],
        ];
        Area3bb::insert($Area3bbs);
    }
}