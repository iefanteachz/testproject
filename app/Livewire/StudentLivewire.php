<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use App\Models\Log;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;




class StudentLivewire extends Component
{
    use WithPagination;

    public $student_id, $name, $age, $gender; 
    protected $paginationTheme = 'bootstrap';
  

   
    public function render()
    {
        $this->students = Student::paginate(5);
        return view('livewire.student-livewire',[
            'students' => $this->students,
                ]);
    }

    public function validateinput()
    {
        $this->validate([
            'name' => 'required',
            'age' => 'required|min:5|max:100', 
            'gender' => 'required|min:3',
            
        ]); 
    }

    public function add()
    {
        $this->validateinput();
          
        Student::updateorcreate(['id' => $this->student_id],[
            'name' => $this->name,
            'age' => $this->age,
            'gender' => $this->gender,
        ]);
        session()->flash('message',  'Student registered');
       $this->resetdata() ;
    }

    public function resetdata()
    {
        $this->name = ''; 
        $this->age = ''; 
        $this->gender = ''; 
        
    }
    public function toggleComplete($studentId)
    {
        $student = Student::find($studentId);
        $student->is_completed = !$student->is_completed;
        $student->save();
        $this->students = Student::all();
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->student_id = $student->id;
        $this->name = $student->name;
        $this->age = $student->age;
        $this->gender = $student->gender;
       
    }
    public function delete($studentId)
    {
        Student::destroy($studentId);
        $this->students = Student::all();
    }


    public function exportPDF()
    {
        $students = Student::all();

        $pdf = PDF::loadView('pdf.students', [
            'students' => $students,
            'date' => now()->format('Y-m-d')
        ]);

        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'students.pdf');
    }
}
