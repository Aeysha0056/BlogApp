<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CommentReceived
{
    
    use Dispatchable, SerializesModels;

    public $comment;
    public $blog;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($comment, $blog)
    {
        //
        $this->comment = $comment;
        $this->blog = $blog;
    }

    
}
