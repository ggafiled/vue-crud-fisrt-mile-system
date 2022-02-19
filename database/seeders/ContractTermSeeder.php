<?php

namespace Database\Seeders;

use App\Models\ContractTerm;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContractTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ContractTerms = [
            [
                'contractTerm' => '1ปี',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'contractTerm' => '2ปี',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'contractTerm' => '3ปี',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
        ];
        ContractTerm::insert($ContractTerms);
    }
}