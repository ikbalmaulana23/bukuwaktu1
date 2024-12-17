<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AsideDashboard extends Component
{
    /**
     * Create a new component instance.
     */
    public $currentRoute;

    public function __construct()
    {
        $this->currentRoute = request()->route()->getName();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.aside-dashboard');
    }
}
