<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobTpye;
class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobtypes = [
            [
                'jobType' => 'New Connection',
            ],
            [
                'jobType' => 'Change Media To',
            ],
            [
                'jobType' => 'Change Address To',
            ],
            [
                'jobType' => 'Add additional outlet (TV)',
            ],
            [
                'jobType' => 'Disconnect by request (Type A/B)',
            ],
            [
                'jobType' => 'Change Address From',
            ],
            [
                'jobType' => 'RO 7',
            ]
        ];
        JobTpye::insert($jobtypes);
    }
}
