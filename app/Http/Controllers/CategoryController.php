<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search') ?? '';
        $categories = Category::search($searchTerm)->orderBy('name')->paginate(10);

        return view('private.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('private.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255'
        ]);
        Category::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso.');
    }

    public function show(Category $category)
    {
        return view('private.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('private.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => ['required', Rule::unique('categories')->ignore($category)]
        ]);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Categoria atualizada com sucesso.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoria deletada com sucesso.');
    }

    public function buscar(Request $request)
    {
        $states = $request->input('search') ?? '';
        $states = Category::search($states)->paginate(10);

        return response()->json($states);
    }
}
