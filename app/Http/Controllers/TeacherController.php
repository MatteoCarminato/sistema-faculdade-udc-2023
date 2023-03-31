<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchTerm = $request->input('search') ?? '';
        $teachers = Teacher::search($searchTerm)->paginate(10);

        return view('private.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('private.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos campos
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers,email',
            'cref' => 'required|unique:teachers,cref',
            'phone' => 'nullable',
        ]);

        // Cria um novo professor com os dados validados
        Teacher::create($validatedData);

        return redirect()->route('teachers.index')->with('success', 'Professor criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('private.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('private.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'cref' => 'required',
            'phone' => 'nullable'
        ]);

        $teacher->name = $validatedData['name'];
        $teacher->email = $validatedData['email'];
        $teacher->cref = $validatedData['cref'];
        $teacher->phone = $validatedData['phone'];
        $teacher->save();

        return redirect()->route('teachers.index')->with('success', 'Professor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Professor excluído com sucesso.');
    }

    public function buscar(Request $request)
    {
        $teacher = $request->input('search') ?? '';
        $teacher = Teacher::search($teacher)->paginate(10);

        return response()->json($teacher);
    }
}