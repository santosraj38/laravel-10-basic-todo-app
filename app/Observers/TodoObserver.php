<?php

namespace App\Observers;

use App\Models\Todo;

class TodoObserver
{

    public function creating(Todo $todo)
    {

        $todo->author_id = auth()->user()->id;
    }
    /**
     * Handle the Todo "created" event.
     */
    public function created(Todo $todo): void
    {
        //
    }

    public function updating(Todo $todo)
    {
        $todo->is_complete = (request()->is_complete==1)?true:false;
    }
    /**
     * Handle the Todo "updated" event.
     */
    public function updated(Todo $todo): void
    {
        //
    }

    /**
     * Handle the Todo "deleted" event.
     */
    public function deleted(Todo $todo): void
    {
        //
    }

    /**
     * Handle the Todo "restored" event.
     */
    public function restored(Todo $todo): void
    {
        //
    }

    /**
     * Handle the Todo "force deleted" event.
     */
    public function forceDeleted(Todo $todo): void
    {
        //
    }
}
