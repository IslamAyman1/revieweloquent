<?php

namespace App\Listeners;

use App\Events\updateEmailEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class updateEmailListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }
    public function handleUpdateEmail(updateEmailEvent $event){
         $event->user->update([
            'email' => 'newEmailFromListner@gmail.com',
        ]);
    }
    public function subscribe(){
         return [
            updateEmailEvent::class => 'handleUpdateEmail'
         ];
    }
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
    }
}
