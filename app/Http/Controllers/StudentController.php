<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController
{
    public function index()
    {
        $students = Student::orderBy('id', 'asc')->paginate(10);
        return view('student.index', ["students" => $students]);
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:20',
            'address' => 'required|max:255',
        ]);
        $data = $request->all();

        Student::create($data);

        return redirect(route('student'))->with('create', 'Created');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('student.show', ["student" => $student]);
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:15',
            'address' => 'required|max:255',
        ]);

        $student->update($data);

        return redirect(route('student'))->with('update', 'Updated');
    }

    public function destroy(Request $request, Student $student)
    {
        $id = $request->id;
        $destroy = Student::findOrFail($id);
        $destroy->delete();
        return redirect(route('student'))->with('delete', 'deleted');
    }
}
