<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Agent;
use Illuminate\Database\Seeder;

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
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'agentDetail' => 'BK23-08 บริษัท เวิร์ด มัลติวิชันส์ จำกัด สาขากรุงเทพ',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'agentDetail' => 'WW-BM-0006-บริษัท เรียล แอดวานซ์ จำกัด',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'agentDetail' => 'WW-BM-0013-บริษัท เวิร์ดมัลติวิชั่นส์ จำกัด',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'agentDetail' => 'NTB1-36 บริษัท พัฒน์ภูมิ จำกัด-10036785 (TA Plus)',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'agentDetail' => '(Blanks)',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        Agent::insert($Agents);
    }
}