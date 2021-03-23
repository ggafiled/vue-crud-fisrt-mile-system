<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BuildingEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $building;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($building)
    {
        $this->building = $building;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('building-channel');
    }

    public function broadcastAs()
    {
        return 'newBuilding';
    }
}