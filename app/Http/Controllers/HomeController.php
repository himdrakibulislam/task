<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function home(){
 
        $books = DB::table('books')
        ->join('author_book', 'books.id', '=', 'author_book.book_id')
        ->join('authors', 'author_book.author_id', '=', 'authors.id')
        ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
        ->select('books.id', 'books.title', 'publishers.name as publisher_name', DB::raw('GROUP_CONCAT(authors.name) as author_names'))
        ->groupBy('books.id', 'books.title', 'publishers.name')
        ->get();
       
        return view('home',compact('books'));
    }
}
