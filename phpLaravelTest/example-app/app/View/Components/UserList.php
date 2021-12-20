<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\Comment;
use Illuminate\View\Component;

class UserList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */



    public function render()
    {
        $users= new User();
        $comments=new Comment();
        return view('components.user-list',['users'=>  $users->all(), 'comments'=>$comments->all()]);
    }
}
