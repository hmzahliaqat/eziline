<?php

namespace App\Listeners;

use App\Events\commentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class commentListener
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
    public function handle(commentEvent $event): void
    {
         // Access the parameters
         $body = $event->body;
         $reciever = $event->reciever;

    }
}
