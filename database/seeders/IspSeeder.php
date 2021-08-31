<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Isp;
class IspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $isps = [
            [
                'isp' => 'True',
            ],
            [
                'isp' => 'Ais',
            ],
            [
                'isp' => '3BB',
            ],
            [
                'isp' => 'TOT',
            ],
            [
                'isp' => 'Fn',
            ],
            [
                'isp' => 'Fibernet',
            ]
        ];
        Isp::insert($isps);
    }
}
