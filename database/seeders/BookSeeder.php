<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Đắc nhân tâm',
            'author' => 'Dale Carnegie',
            'img'=> '1.png',
            'status' => '0'
        ]);

        Book::create([
            'title' => 'Thiên Tài Bên Trái, Kẻ Điên Bên Phải',
            'author' => 'Cao Minh',
            'img'=> '2.png',
            'status' => '0'
        ]);
        Book::create([
            'title' => 'Cà Phê Cùng Tony (Tái Bản 2017)',
            'author' => 'Tony Buổi Sáng',
            'img'=> '3.png',
            'status' => '0'
        ]);
        Book::create([
            'title' => 'Trên Đường Băng (Tái Bản 2017)',
            'author' => 'Tony Buổi Sáng',
            'img'=> '4.png',
            'status' => '0'
        ]);
        Book::create([
            'title' => 'Mắt Biếc (Tái Bản 2019)',
            'author' => 'Nguyễn Nhật Ánh',
            'img'=> '5.png',
            'status' => '0'
        ]);
    }
}
