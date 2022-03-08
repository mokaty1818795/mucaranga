<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Spatie\Searchable\Search;

class SearchStudent extends Component
{
    public $searchResults;
    public $searchQuery;
    public $counter;

    public function mount()
    {
        $this->searchQuery = "";
        $this->searchResults = collect([]);
        $this->counter = 0;
    }
    public function render()
    {
        return view('livewire.search-student');
    }


    public function updated()
    {
        $this->counter++;
        $this->searchResults = (new Search())
        ->registerModel(Student::class, 'name','student_code')
        ->search($this->searchQuery)->take(5);
    }
}
