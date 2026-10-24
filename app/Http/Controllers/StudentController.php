<?php

namespace App\Http\Controllers;

use App\Models\{Course, Student};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $students = Student::with('course')->latest()->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create', ['courses' => Course::all()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'unique:students,email'],
            'course_id' => ['required', 'exists:courses,id'],
        ]);

        $data['user_id'] = $request->user()->id;
        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student added.');
    }

    public function show(Student $student)
    {
        $student->load('course');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $this->authorize('update', $student);
        return view('students.edit', ['student' => $student, 'courses' => Course::all()]);
    }

    public function update(Request $request, Student $student)
    {
        $this->authorize('update', $student);

        $data = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', Rule::unique('students', 'email')->ignore($student->id)],
            'course_id' => ['required', 'exists:courses,id'],
        ]);

        $student->update($data);
        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student)
    {
        $this->authorize('delete', $student);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
}