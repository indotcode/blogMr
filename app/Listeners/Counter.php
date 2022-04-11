<?php

namespace App\Listeners;

use App\Events\PostHasViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;

class Counter implements ShouldQueue
{
    use InteractsWithQueue;

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
     * @param PostHasViewed $event
     * @return void
     */
    public function handle(PostHasViewed $event)
    {
        $event->post->increment('view');
    }

    public function retryUntil(): Carbon
    {
        return now()->addMinutes(5);
    }
}
