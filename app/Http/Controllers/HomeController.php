<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    public function home(){

        $perPage = 5; // Number of items per page

        $total = DB::table('books')
        ->count();
        $currentPage = Paginator::resolveCurrentPage('page');

        $totalPage = ceil($total / $perPage);
        
        $books = DB::table('books')
        ->join('author_book', 'books.id', '=', 'author_book.book_id')
        ->join('authors', 'author_book.author_id', '=', 'authors.id')
        ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
        ->select('books.id', 'books.title', 'publishers.name as publisher_name', DB::raw('GROUP_CONCAT(authors.name) as author_names'))
        ->groupBy('books.id', 'books.title', 'publishers.name')
        ->skip(($currentPage - 1) * $perPage)
        ->take($perPage)
        ->get();
       
        return view('home',compact('books','totalPage','currentPage'));
    }
}
