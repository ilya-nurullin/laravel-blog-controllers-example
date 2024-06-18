<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected string $label,
        protected string $type,
        protected string $name,
        protected $error,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-field', [
            'label' => $this->label,
            'type' => $this->type,
            'name' => $this->name,
            'error' => $this->error ?: null,
        ]);
    }
}
