<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'isps_color' => '',
                'isps_map_icon' => 'https://raw.githubusercontent.com/ggafiled/vue-crud-fisrt-mile-system/main/public/images/true_mark.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'isp' => 'Ais',
                'isps_color' => '',
                'isps_map_icon' => 'https://raw.githubusercontent.com/ggafiled/vue-crud-fisrt-mile-system/main/public/images/ais_mark.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'isp' => '3BB',
                'isps_color' => '',
                'isps_map_icon' => 'https://raw.githubusercontent.com/ggafiled/vue-crud-fisrt-mile-system/main/public/images/3bb_mark.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'isp' => 'TOT',
                'isps_color' => '',
                'isps_map_icon' => 'https://raw.githubusercontent.com/ggafiled/vue-crud-fisrt-mile-system/main/public/images/tot_mark.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'isp' => 'TXRX',
                'isps_color' => '',
                'isps_map_icon' => 'https://raw.githubusercontent.com/ggafiled/vue-crud-fisrt-mile-system/main/public/images/txrx_mark.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'isp' => 'Fibernet',
                'isps_color' => '',
                'isps_map_icon' => 'https://raw.githubusercontent.com/ggafiled/vue-crud-fisrt-mile-system/main/public/images/fibernet_mark.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'isp' => 'Other',
                'isps_color' => '',
                'isps_map_icon' => 'https://raw.githubusercontent.com/ggafiled/vue-crud-fisrt-mile-system/main/public/images/other_mark.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ];
        Isp::insert($isps);
    }
}