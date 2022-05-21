<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard',[
            'borrow'=> Borrow::all(),
            'count1'=> Book::where('status','2')->count(),
            'count2'=> Book::where('status','0')->count(),
            'count3'=> Borrow::where('returndate','!=','null')->count(),
        ]);
    }


    public function book(){
        return view('admin.book',[
            'book'=> Book::all(),
            'count1'=> Book::where('status','2')->count(),
            'count2'=> Book::where('status','0')->count(),
            'count3'=> Book::where('status','1')->count(),
        ]);
    }
}
