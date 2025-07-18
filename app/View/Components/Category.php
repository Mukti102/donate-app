<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Category extends Component
{
    /**
     * Create a new component instance.
     */
    public $categories;
    public $campaigns;
    public $donaturs;
    public function __construct($categories=null,$campaigns=null,$donaturs=null)
    {
        $this->categories = $categories;
        $this->campaigns = $campaigns;
        $this->donaturs = $donaturs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category');
    }
}
