<?php

namespace App\Listeners;

use App\Events\commentNotifyEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class commentNotifyListener
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
    public function handle(commentNotifyEvent $event): void
    {
        //
    }
}
