<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function writers(){
        $authors = Author::all();
        return view('author.all',compact('authors'));
    }
    public function get_writer(int $id){
        $author = Author::findOrFail($id);
        return view('author.view',compact('author'));
    }
    public function index(){
        $authors = Author::all();
        return view('author.index',compact('authors'));
    }
    public function store(Request $request){
        Author::create($request->all());
        return redirect()->back()->with('status','Author  Added');
    }
    public function remove(int $id){
        Author::destroy($id);
        return redirect()->back()->with('status','Author removed');
    }

}
