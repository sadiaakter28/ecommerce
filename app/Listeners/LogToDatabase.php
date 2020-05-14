<?php

namespace App\Listeners;

use App\Events\OrderLogEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogToDatabase
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param OrderLogEvent $event
     * @return void
     */
    public function handle(OrderLogEvent $event)
    {
        User::update([
            'create_at' => now(),
            'user_id' => $event->user->id,
        ]);

    }
}
