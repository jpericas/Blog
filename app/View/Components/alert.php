<?php

namespace App\View\Components;

use Illuminate\View\Component;

class alert extends Component
{
    public $alertType;
    public $post;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($alertType = 'primary', $post = null)
    {
        $this->alertType = $alertType;
        $this->post = $post;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }

    public function majuscules($v){
        return strtoupper($v);
    }
}
