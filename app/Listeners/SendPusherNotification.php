<?php

namespace App\Listeners;

use App\Events\SubscribedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;

class SendPusherNotification
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
     * @param  SubscribedEvent  $event
     * @return void
     */
    public function handle(SubscribedEvent $event)
    {
        $pusher = App::make('pusher');
        $pusher->trigger('test-channel', 'test-event', array('text' => $event->text));
    }
}
