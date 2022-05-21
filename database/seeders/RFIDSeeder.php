<?php

namespace Database\Seeders;

use App\Models\RfidTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RFIDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RfidTag::create([
            'rfid'=>'E28011606000020958CD98FE',
            'book_id'=>1
        ]);
        RfidTag::create([
            'rfid'=>'E28011606000020958CDF87E',
            'book_id'=>2
        ]);
        RfidTag::create([
            'rfid'=>'E28011606000020958CDF86E',
            'book_id'=>3
        ]);
        RfidTag::create([
            'rfid'=>'E28011606000020958CE220E',
            'book_id'=>4
        ]);
        RfidTag::create([
            'rfid'=>'E28011606000020958CDC43E',
            'book_id'=>5
        ]);
    }
}
