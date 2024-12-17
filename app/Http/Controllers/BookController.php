<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Resources\CategoryResource;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $booksQuery = Book::query();

        $this->applySearch($booksQuery, $request->search);

        $books = BookResource::collection(
            $booksQuery->paginate(10)
        );

        // Return the data to the Inertia view
        return inertia('books/index', [
            'books' => $books,
            'search' => $request->search ?? '',
        ]);
    }

    protected function applySearch($query, $search){
        return $query->when($search, function($query, $search){
            $query->where('title', 'like', '%'.$search.'%')
            ->orWhere('author', 'like', '%'.$search.'%')
            ->orWhere('isbn', 'like', '%'.$search.'%');
        });
    }
    

    public function create()
    {
        // Fetch all categories
        $categories = CategoryResource::collection(Category::all());

        // Return the data to the Inertia view
        return inertia('books/create', [
            'categories' => $categories,
        ]);
    }

    public function store(StoreBookRequest $request)
    {
        // Create a new book with validated data
        Book::create($request->validated());

        // Redirect to the index page
        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        // Fetch all categories
        $categories = CategoryResource::collection(Category::all());

        // Return the data to the Inertia view
        return inertia('books/edit', [
            'categories' => $categories,
            'book' => BookResource::make($book),
        ]);
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        // The validated data is available via $request->validated()
        $book->update($request->validated());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book){
        $book->delete();
        return redirect()->route('books.index');
    }
}
