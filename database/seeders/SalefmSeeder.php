<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Salefm;
class SalefmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Salefms = [
            [
                'nameSale' => 'คุณรดา : 062 4549289',
            ],
            [
                'nameSale' => 'คณโจ : 095 2495713',
            ],
            [
                'nameSale' => 'คุณเบล : 098 2426245',
            ],
            [
                'nameSale' => 'คุณเพชร : 091 4262915',
            ],
            [
                'nameSale' => 'คุณโอ๋ : 061 9955389',
            ],
            [
                'nameSale' => 'คุณพล : 084 6804917',
            ],
            [
                'nameSale' => 'คุณแขก : 095 5465172',
            ],
            [
                'nameSale' => 'คุณปุ๋ย : 095 7955862',
            ],
            [
                'nameSale' => 'คุณเต๋ : 095 7145861',
            ],
            [
                'nameSale' => 'คุณใหม่ : 063 3436657',
            ],
        ];
        Salefm::insert($Salefms);
    }
}
