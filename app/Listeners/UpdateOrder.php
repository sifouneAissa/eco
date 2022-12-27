<?php

namespace App\Listeners;

use App\Models\OrderDetail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateOrder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // send the notification
        $event->user->notify(new \App\Notifications\UpdateOrder($event->info));
    }
}
