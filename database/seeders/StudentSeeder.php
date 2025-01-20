<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'std 1',
            'age' => '15',
            'gender' => 'male',  
            
         ]);
         Student::create([
            'name' => 'std 2',
            'age' => '19',
            'gender' => 'female',  
            
         ]);
    }
}
