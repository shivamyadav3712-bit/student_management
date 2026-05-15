<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation; // Added for validation

class StudentsImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        return new Student([
            'name'    => $row['name'],
            'email'   => $row['email'],
            'phone'   => $row['phone'],
            'course'  => $row['course'],
            'address' => $row['address'], 
        ]);
    }

    /**
     * Enforce your namenumber@gmail.com rule even for Excel imports!
     */
    public function rules(): array
    {
        return [
            'name'  => 'required|string',
            'email' => [
                'required',
                'email',
                'unique:students,email',
                
            ],
            'phone'   => 'required|numeric|digits:10',
            'course'  => 'required',
            'address' => 'required|string|max:500',
        ];
    }
}