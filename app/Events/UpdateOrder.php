<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateOrder
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $info;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user,$info)
    {
        //
        $this->user = $user;
        $this->info = $info;
    }

//    /**
//     * Get the channels the event should broadcast on.
//     *
//     * @return \Illuminate\Broadcasting\Channel|array
//     */
//    public function broadcastOn()
//    {
//        // name here your notification
//        return new PrivateChannel('app.user.'.$this->user->id);
//    }
}
