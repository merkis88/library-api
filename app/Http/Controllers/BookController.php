<?php

namespace App\Http\Controllers;

use App\Models\Book;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookController extends Controller
{
    public function store(Request $request): JsonResource
    {
        $validatedData = $request->validate([
           'title' => 'required|string|max:255',
           'author' => 'required|string|max:255',
           'genre' => 'required|string|max:255',
           'description' => 'nullable|string',
        ]);

        $createdBook = Book::create($validatedData);
        return response()->json($createdBook, 201);
    }

    public function getAllBooks(): JsonResource
    {
        $books = Book::all();
        return response()->json($books);

    }
}
