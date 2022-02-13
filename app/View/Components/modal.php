<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $modalDataId;
    public $modalTitle;
    public function __construct($modalDataId, $modalTitle)
    {
        $this->modalTitle = $modalTitle;
        $this->modalDataId = $modalDataId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
