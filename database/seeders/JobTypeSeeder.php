<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobTpye;
class JobTpyeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $JobTpyes = [
            [
                'JobTpye' => 'New Connection',
            ],
            [
                'JobTpye' => 'Change Media To',
            ],
            [
                'JobTpye' => 'Change Address To',
            ],
            [
                'JobTpye' => 'Add additional outlet (TV)',
            ],
            [
                'JobTpye' => 'Disconnect by request (Type A/B)',
            ],
            [
                'JobTpye' => 'Change Address From',
            ],
            [
                'JobTpye' => 'RO 7',
            ]
        ];
        JobTpye::insert($JobTpyes);
    }
}
