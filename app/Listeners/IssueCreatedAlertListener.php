<?php

namespace App\Listeners;

use App\Events\IssueCreatedEvent;
use App\Mail\IssueCreatedMail;
use App\Models\AlertEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class IssueCreatedAlertListener
{
    /**
     * Create the event listener.
     */


    public function __construct($input)
    {
    }

    /**
     * Handle the event.
     */
    public function handle(IssueCreatedEvent $event): void
    {
        $emails = AlertEmail::find(1);

        $emails = explode(' ', $emails->emails);

        foreach($emails as $email){
            if($email == '' or $email == null){
                return;
            }
        } 

        Mail::to($emails)->send(new IssueCreatedMail($event->input));
    }
}
