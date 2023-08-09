<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Services\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    private $teacherService;

    // Inicialize o serviço no construtor
    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchTerm = $request->input('search') ?? '';
        $teachers = $this->teacherService->all($searchTerm);

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

        // Crie um novo professor usando o serviço
        $this->teacherService->create($validatedData);

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

        // Atualize o professor usando o serviço
        $this->teacherService->update($teacher, $validatedData);

        return redirect()->route('teachers.index')->with('success', 'Professor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        // Exclua o professor usando o serviço
        $this->teacherService->deleteTeacher($teacher);

        return redirect()->route('teachers.index')->with('success', 'Professor excluído com sucesso.');
    }

    public function buscar(Request $request)
    {
        $searchTerm = $request->input('search') ?? '';
        $teachers = $this->teacherService->all($searchTerm);

        return response()->json($teachers);
    }
}