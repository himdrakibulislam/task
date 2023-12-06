<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required',
            'publisher_id' => 'required',
        ]);
        if ($validators->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validators->messages(),
            ]);
        }
        $publisher = Publisher::whereId($request->publisher_id)->first();
        if (!$publisher) {
            return response()->json('Publisher Not Found', 404);
        }

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

            return response()->json('Book Added', 200);
        } else {
            return response()->json("Some Author IDs are missing: " . implode(', ', $missingIds), 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required',
            'publisher_id' => 'required',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validators->messages(),
            ]);
        }
        $book = Book::whereId($id)->first();
        if (!$book) {
            return response()->json('Invalid ID', 404);
        }
        $publisher = Publisher::whereId($request->publisher_id)->first();
        if (!$publisher) {
            return response()->json('Invalid Publisher ID ', 404);
        }

        $authorIds = $request->input('authors');

        $existingIds = Author::whereIn('id', $authorIds)->pluck('id')->toArray();

        // Compare the input IDs with the existing IDs
        $missingIds = array_diff($authorIds, $existingIds);

        if (empty($missingIds)) {
            $book->title = $request->title;
            $book->publisher_id = $request->publisher_id;
            $book->update();
            $book->authors()->sync($request->input('authors'));
            return response()->json($book->title . ' Updated', 200);
        } else {
            return response()->json("Some Author IDs are missing: " . implode(', ', $missingIds), 404);
        }
    }

    public function remove(int $id)
    {
        $book = Book::whereId($id)->first();
        if (!$book) {
            return response()->json('Invalid ID', 404);
        }

        $book->delete();
        return response()->json($book->title . ' Deleted', 200);
    }
}
