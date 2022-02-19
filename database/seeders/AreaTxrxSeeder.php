<?php

namespace Database\Seeders;

use App\Models\AreaTxrx;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AreaTxrxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AreaTxrxs = [
            [
                'AreaTxrx' => 'YES',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'AreaTxrx' => 'No',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'AreaTxrx' => 'N/A',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
        ];
        AreaTxrx::insert($AreaTxrxs);
    }
}