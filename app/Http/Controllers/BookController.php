<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBooksRequest;
use App\Http\Requests\UpdateBooksRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = null;
        $conditions = [];

        if ($request->method('post')) {

            $filters = $this->validate($request, [
                'title' => ['nullable', 'min:3', 'max:150'],
                'publication_year' => ['nullable', 'numeric', 'between:1500,' . date('Y')],
                'author_id' => ['nullable', 'numeric']
            ]);

            if (!empty($filters['title'])) {
                $conditions[] = ['title', 'LIKE', '%' . strip_tags(trim($filters['title'])) . '%'];
            }

            if (!empty($filters['publication_year'])) {
                $conditions[] = ['publication_year', '=', $filters['publication_year']];
            }

            if (!empty($filters['author_id'])) {
                $conditions[] = ['author_id', '=', $filters['author_id']];
            }
        }

        $authors = Author::orderBy('name', 'asc')->pluck('name', 'id');
        $books = Book::where($conditions)->with('bookAuthor')->orderBy('id', 'desc')->paginate();
        return view('books.index', compact('books', 'filters', 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::orderBy('name', 'asc')->pluck('name', 'id');
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBooksRequest $request)
    {
        $filters = $request->validated();

        $fileExtension = $request->file('img_path')->extension();
        $fileName = Str::uuid() . '.' . $fileExtension;
        $filePath = $request->img_path->storeAs("public/covers/" . Str::uuid(), $fileName);

        $filters['img_path'] = $filePath;

        if (!Book::create($filters)) {
            return redirect()->route('books.index')
                ->with('red', 'Gravação não efetuada!');
        }

        return redirect()->route('books.index')
            ->with('blue', 'Gravação efetuada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$book = Book::where('id', $id)->with('bookAuthor')->orderBy('id', 'desc')->first()) {
            return redirect()->route('books.index')
                ->with('red', 'Registro não localizado!');
        }

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$book = Book::where('id', $id)->first()) {
            return redirect()->route('books.index')
                ->with('red', 'Registro não localizado!');
        }

        $authors = Author::orderBy('name', 'asc')->pluck('name', 'id');
        return view('books.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBooksRequest $request, string $id)
    {
        if (!$book = Book::where('id', $id)->first()) {
            return redirect()->route('books.index')
                ->with('red', 'Registro não localizado!');
        }

        $filters = $request->validated();

//        dd($book->img_path, file_exists('storage/' . $book->img_path), $oldDirectory);

        if ($request->file('img_path') !== null) {
            $oldDirectory = explode('/', $book->img_path);
            $oldDirectory = $oldDirectory[1];
            $fileExtension = $request->file('img_path')->extension();
            $fileName = Str::uuid() . '.' . $fileExtension;
            $directory = Str::uuid();
            $filePath = "covers/" . $directory . '/' . $fileName;
            $storeFile = $request->img_path->storeAs("public/covers/$directory", $fileName);
            $filters['img_path'] = $filePath;

            if (file_exists('storage/' . $book->img_path)) {
                unlink('storage/' . $book->img_path);
                rmdir('storage/covers/' . $oldDirectory);
            }
        }

        if (!$book->update($filters)) {
            return redirect()->route('books.edit', $id)
                ->with('red', 'Gravação não efetuada!');
        }

        return redirect()->route('books.index')
            ->with('blue', 'Gravação efetuada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Book::where('id', $id)->delete()) {
            return redirect()->route('books.index')
                ->with('red', 'Registro não localizado!');
        }

        return redirect()->route('books.index')
            ->with('blue', 'Registro excluído com sucesso!');
    }
}
