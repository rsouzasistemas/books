<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        $books = Book::count();
        $authors = Author::count();

        return view('home.index', compact('books', 'authors'));
    }
}
