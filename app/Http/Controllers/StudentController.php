<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->input('search');

        $students = Student::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('course', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10); 

        return view('students.index', compact('students'));
    }

              //FOR ADDING STUDENT//

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'unique:students,email',
                'regex:/^[a-zA-Z]+[0-9]+@gmail\.com$/',
            ],
            'phone'   => 'required|numeric|digits:10',
            'course'  => 'required|string',
            'address' => 'required',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }
        
    //FOR EDIT STUDENT DETAIL//

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }
         //FOR DELETE A STUDENT DETAILS//

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
          // FOR IMPORT A STUDENT DETAILS ////

    public function import(Request $request) 
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls',
        ]);

        Excel::import(new StudentsImport, $request->file('file'));
                
        return redirect()->back()->with('success', 'All students imported successfully!');
    }
    
     
     
}