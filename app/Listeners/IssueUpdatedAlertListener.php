<?php

namespace App\Listeners;

use App\Events\IssueUpdatedEvent;
use App\Mail\IssueUpdatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class IssueUpdatedAlertListener
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
    public function handle(IssueUpdatedEvent $event): void
    {
        Mail::to('rahul@etakeawaymax.com')->send(new IssueUpdatedMail($event->input, $event->website));
    }
}
