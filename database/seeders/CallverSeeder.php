<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Callver;
class CallverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Callvers = [
            [
                'callVer' => 'ติดต่อได้',
            ],
            [
                'callVer' => 'ติดต่อไม่ได้ครั้งที่ 1',
            ],
            [
                'callVer' => 'ติดต่อไม่ได้ครั้งที่ 2',
            ],
            [
                'callVer' => 'ติดต่อไม่ได้ครั้งที่ 3',
            ],
        ];
        Callver::insert($Callvers);
    }
}
