<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index(){
        $books = Book::latest()->paginate(10);
        return view('welcome',compact('books'));
    }
}
