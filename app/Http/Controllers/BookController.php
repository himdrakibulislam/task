<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function add()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('book.add', compact('authors', 'publishers'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'publisher_id' => 'required',
        ]);
        $authorIds = $request->input('authors');

        $existingIds = Author::whereIn('id', $authorIds)->pluck('id')->toArray();

        // Compare the input IDs with the existing IDs
        $missingIds = array_diff($authorIds, $existingIds);

        if (empty($missingIds)) {
            $book = new Book();
            $book->title = $request->title;
            $book->publisher_id = $request->publisher_id;
            $book->save();

            // Assuming author IDs exist in the authors table
            $book->authors()->attach($authorIds);

            return redirect()->back()->with('status', 'Book Added');
        } else {
            echo "Some Author IDs are missing: " . implode(', ', $missingIds);
        }
    }
}
