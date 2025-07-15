<?php

namespace App\Listeners;

use App\Events\FireEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FireListener
{
    // listener is subscriber 
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FireEvent $event): void
    {
        $event->user->update([
            'name' => 'updated name',
        ]); 
    }
}
