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
            'rfid'=>'41003200300036003400300030003100',
            'book_id'=>1
        ]);
        RfidTag::create([
            'rfid'=>'300EFE2F94D01C42540BE4F9',
            'book_id'=>2
        ]);
        RfidTag::create([
            'rfid'=>'E20000173001017129000096',
            'book_id'=>3
        ]);
        RfidTag::create([
            'rfid'=>'300EFE2F94D01C02540BE93A',
            'book_id'=>4
        ]);
        RfidTag::create([
            'rfid'=>'E200001730010136290000DD',
            'book_id'=>5
        ]);
    }
}
