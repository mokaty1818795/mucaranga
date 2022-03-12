<?php

namespace App\Http\Livewire;

use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class InstructorDashboard extends Component
{
    use WithPagination;
    public $instructor;
    public $classRooms;
    public $classRoomId;
    public $students;
    public function mount(User $instructor)
    {
        $this->instructor = $instructor;
        $this->classRooms  = $this->instructor->class_rooms;
        $this->classRoomId =  null ;
        $this->students = collect([]);
    }

    public function render()
    {
        return view('livewire.instructor-dashboard');
    }


    public function updateClassRoom($id)
    {
        $this->classRoomId =  $id ;
        if(!is_null($this->classRoomId) ){
           $this->students =Student::whereHas('class_rooms',function($query){
                $query->where('instructor_id',$this->instructor->id);
                $query->where('class_rooms.id',$this->classRoomId);
            })->get();
        }else{
             $this->students = collect([]);
        }
    }
}
