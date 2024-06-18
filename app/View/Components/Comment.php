<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Comment as CommentModel;

class Comment extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public CommentModel $comment)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comment', ['comment' => $this->comment]);
    }
}
