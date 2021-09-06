<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agent;
class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Agents = [
            [
                'agentDetail' => '10/5 ปทุมธานี',
            ],
            [
                'agentDetail' => 'BK23-08 บริษัท เวิร์ด มัลติวิชันส์ จำกัด สาขากรุงเทพ',
            ],
            [
                'agentDetail' => 'WW-BM-0006-บริษัท เรียล แอดวานซ์ จำกัด',
            ],
            [
                'agentDetail' => 'WW-BM-0013-บริษัท เวิร์ดมัลติวิชั่นส์ จำกัด',
            ],
            [
                'agentDetail' => 'NTB1-36 บริษัท พัฒน์ภูมิ จำกัด-10036785 (TA Plus)',
            ],
            [
                'agentDetail' => '(Blanks)',
            ],
        ];
        Agent::insert($Agents);
    }
}
