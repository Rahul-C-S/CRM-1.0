<?php

namespace App\Listeners;

use App\Events\IssueUpdatedEvent;
use App\Mail\IssueUpdatedMail;
use App\Models\AlertEmail;
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
        $emails = AlertEmail::find(1);
        $emails = explode(' ', $emails->emails);

        foreach($emails as $email){
            if($email == '' or $email == null){
                return;
            }
        } 
        Mail::to($emails)->send(new IssueUpdatedMail($event->input, $event->website));
        
    }
}
