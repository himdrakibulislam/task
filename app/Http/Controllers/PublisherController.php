<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(){
        $publishers = Publisher::all();
        return view('publisher.index',compact('publishers'));
    }
    public function store(Request $request){
        Publisher::create($request->all());
        return redirect()->back()->with('status','Publisher  Added');
    }
    public function remove(int $id){
        Publisher::destroy($id);
        return redirect()->back()->with('status','Publisher removed');
    }

}
