<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // It's safer to validate data before creating
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => [
            'required',
            'email',
            'unique:students,email',
            'regex:/^[a-zA-Z]+[0-9]+@gmail\.com$/',
        ],
            'phone' => 'required|numeric|digits:10',
            'course'=> 'required|string',
            'address' => 'required',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    public function edit(Student $student)
    {
        // This opens the edit form and passes the specific student's data
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        // Updates the existing student record
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        // Deletes the student from the database
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }

    public function import(Request $request) 
{
    $request->validate([
        'file' => 'required|mimes:csv,xlsx,xls',
    ]);

    Excel::import(new StudentsImport, $request->file('file'));
            
    return redirect()->back()->with('success', 'All students imported successfully!');
}


}
    