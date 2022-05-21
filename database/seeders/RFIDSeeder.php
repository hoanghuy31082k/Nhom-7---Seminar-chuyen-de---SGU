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
            'rfid'=>'300F4F573AD001C08369A28F',
            'book_id'=>1
        ]);
        RfidTag::create([
            'rfid'=>'300F4F573AD001C08369A22E',
            'book_id'=>2
        ]);
        RfidTag::create([
            'rfid'=>'300F4F573AD001C08369A245',
            'book_id'=>3
        ]);
        RfidTag::create([
            'rfid'=>'300F4F573AD001C08369A249',
            'book_id'=>4
        ]);
        RfidTag::create([
            'rfid'=>'300F4F573AD001C08369A241',
            'book_id'=>5
        ]);
    }
}
