<?php

namespace App\View\Components\Page;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $breadcrumb;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        array $breadcrumb,
        string $title
    )
    {
        $this->breadcrumb = $breadcrumb;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumb.breadcrumb');
    }

    public function is_active($route_name)
    {
        return $route_name == '' ? 'active' : '';
    }
}
