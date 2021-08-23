<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teamserway;
class TeamserwaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Teamserways = [
            [
                'nameSerway' => 'คุณโอ๋ : 061 995 5389',
            ],
            [
                'nameSerway' => 'คุณอ๋อง : 087 003 0777',
            ],
            [
                'nameSerway' => 'คุณบอย : 094 826 5323',
            ],
        ];
        Teamserway::insert($Teamserways);
    }
}
