<?php

namespace App\Events;

use App\Models\DevModel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DevCreated
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $dev;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(DevModel $dev)
    {
        $this->dev = $dev;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
