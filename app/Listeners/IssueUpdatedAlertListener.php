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

        if(env('MAIL_MAILER') == null or env('MAIL_HOST') == null or env('MAIL_PORT') == null or env('MAIL_USERNAME') == null or env('MAIL_PASSWORD') == null or env('MAIL_ENCRYPTION') == null or env('MAIL_FROM_ADDRESS') == null){
            return;            
        }
        
        Mail::to($emails)->send(new IssueUpdatedMail($event->input, $event->website));
        
    }
}
