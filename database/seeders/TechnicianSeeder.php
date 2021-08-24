<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technician;
class TechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Technicians = [
            [
                'teamTechnician' => 'DCL - (จ้อย)',
            ],
            [
                'teamTechnician' => 'DCL - (บี)',
            ],
            [
                'teamTechnician' => 'DCL - Blow (เล่)',
            ],
            [
                'teamTechnician' => 'DCL - MA (บอล)',
            ],
            [
                'teamTechnician' => 'DCL - MA (แบงค์)',
            ],
            [
                'teamTechnician' => 'LKB - (คิว) ทรงพล',
            ],
            [
                'teamTechnician' => 'LKB - (ยุทธ) ยงยุทธ',
            ],
            [
                'teamTechnician' => 'LKB - (วา) ตรีทศ',
            ],
            [
                'teamTechnician' => 'PKR - (โชค)',
            ],
            [
                'teamTechnician' => 'PKR - (ดุง) ผดุงศักดิ์',
            ],
            [
                'teamTechnician' => 'PKR - (ทุ่ง) ประทวน',
            ],
            [
                'teamTechnician' => 'PKR - (นิค)',
            ],
            [
                'teamTechnician' => 'PKR - (บาส) ชฎาภรณ์',
            ],
            [
                'teamTechnician' => 'PKR - (เบิ้ม)',
            ],
            [
                'teamTechnician' => 'PKR - (แบล็ค)',
            ],
            [
                'teamTechnician' => 'PKR - (มิว) อดิศักดิ์',
            ],
            [
                'teamTechnician' => 'PKR - (อาร์ม) เสรี',
            ],
            [
                'teamTechnician' => 'PKR - MA (ตั้ม)',
            ],
            [
                'teamTechnician' => 'KTW - นิกร',
            ],
            [
                'teamTechnician' => 'KTW - สมพร',
            ],
            [
                'teamTechnician' => 'KTW - สุรเดช',
            ],
            [
                'teamTechnician' => 'PTN - (แบงค์) สมชาย',
            ],
        ];
        Technician::insert($Technicians);
    }
}
