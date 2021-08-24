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
        $payments = [
            [
                'paymentType' => 'ไม่แบ่งรายได้',
            ],
            [
                'paymentType' => 'แบ่งรายได้ทุกเดือน',
            ],
            [
                'paymentType' => 'ชำระรายปี',
            ],
            [
                'paymentType' => 'ชำระรายปี แล้วแบ่งรายได้',
            ],
            [
                'paymentType' => 'ชำระรายปีแบบขั้นบันได',
            ],
        ];
        Payment::insert($payments);
    }
}
