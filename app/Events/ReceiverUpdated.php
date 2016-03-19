<?php

namespace Kleinespende\Events;

use Kleinespende\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Kleinespende\Models\Receiver;

class ReceiverUpdated extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $receiver;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['receiverUpdated'];
    }
}
