<?php

namespace App\Listeners;

use App\Events\FireEvent;
use App\Events\LogoutEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogoutListener
{
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
    public function handleUserRegister(FireEvent $event): void
    {
        $event->user->update([
            'name' => 'updated name in register',
        ]);

    }
    public function handleUserLogOut(LogoutEvent $event): void
    {
        $event->user->update([
            'name' => 'updated name in logout',
        ]);

    }
    public function subscribe($events)
    {
       return [
          FireEvent::class => [
              'handleUserRegister',
          ],
          LogoutEvent::class => [
              'handleUserLogOut',
          ],
       ];
    }
    // public function handle(LogoutEvent $event): void
    // {
    //     $event->user->update([
    //         'name' => 'logout name',
    //     ]);
    // }
}
