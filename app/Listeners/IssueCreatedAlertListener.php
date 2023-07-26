<?php

namespace App\Listeners;

use App\Events\IssueCreatedEvent;
use App\Mail\IssueCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class IssueCreatedAlertListener
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
    public function handle(IssueCreatedEvent $event): void
    {
        
        Mail::to('rahul@etakeawaymax.com')->send(new IssueCreatedMail($event->input));
    }
}
