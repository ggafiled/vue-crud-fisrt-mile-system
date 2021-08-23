<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Payments = [
            [
                'paymenType' => 'ไม่แบ่งรายได้',
            ],
            [
                'paymenType' => 'แบ่งรายได้ทุกเดือน',
            ],
            [
                'paymenType' => 'ชำระรายปี',
            ],
            [
                'paymenType' => 'ชำระรายปี แล้วแบ่งรายได้',
            ],
            [
                'paymenType' => 'ชำระรายปีแบบขั้นบันได',
            ],
        ];
        Payment::insert($Payments);
    }
}
