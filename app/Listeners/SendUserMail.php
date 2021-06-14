<?php

namespace App\Listeners;

use App\Events\DevCreated;

class SendUserMail
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
     * @return void
     */
    public function handle(DevCreated $event)
    {
        dd($event);
    }
}
