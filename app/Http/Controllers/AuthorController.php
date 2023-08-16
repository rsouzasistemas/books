<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorsRequest;
use App\Http\Requests\UpdateAuthorsRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
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
                'name' => ['nullable', 'min:3', 'max:100'],
                'zip_code' => ['nullable', 'min:3', 'max:9'],
                'city' => ['nullable', 'min:3', 'max:50'],
                'district' => ['nullable', 'min:3', 'max:50']
            ]);

            if (!empty($filters['name'])) {
                $conditions[] = ['name', 'LIKE', '%' . strip_tags(trim($filters['name'])) . '%'];
            }

            if (!empty($filters['zip_code'])) {
                $conditions[] = ['zip_code', '=', strip_tags(trim($filters['zip_code']))];
            }

            if (!empty($filters['city'])) {
                $conditions[] = ['city', 'LIKE', '%' . strip_tags(trim($filters['city'])) . '%'];
            }

            if (!empty($filters['district'])) {
                $conditions[] = ['district', 'LIKE', '%' . strip_tags(trim($filters['district'])) . '%'];
            }
        }

        $authors = Author::where($conditions)->orderBy('id', 'desc')->paginate();
        return view('authors.index', compact('authors', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorsRequest $request)
    {
        $filters = $request->validated();

        if (!Author::create($filters)) {
            return redirect()->route('authors.index')
                ->with('red', 'Gravação não efetuada!');
        }

        return redirect()->route('authors.index')
            ->with('blue', 'Gravação efetuada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$author = Author::where('id', $id)->first()) {
            return redirect()->route('authors.index')
                ->with('red', 'Registro não localizado!');
        }

        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$author = Author::where('id', $id)->first()) {
            return redirect()->route('authors.index')
                ->with('red', 'Registro não localizado!');
        }

        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorsRequest $request, string $id)
    {
        if (!$author = Author::where('id', $id)->first()) {
            return redirect()->route('authors.index')
                ->with('red', 'Registro não localizado!');
        }

        $filters = $request->validated();

        if (!$author->update($filters)) {
            return redirect()->route('authors.edit', $id)
                ->with('red', 'Gravação não efetuada!');
        }

        return redirect()->route('authors.index')
            ->with('blue', 'Gravação efetuada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Author::where('id', $id)->delete()) {
            return redirect()->route('authors.index')
                ->with('red', 'Registro não localizado!');
        }

        return redirect()->route('authors.index')
            ->with('blue', 'Registro excluído com sucesso!');
    }
}
