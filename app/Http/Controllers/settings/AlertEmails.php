<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailUpdateRequest;
use App\Models\AlertEmail;
use Illuminate\Http\Request;

class AlertEmails extends Controller
{
    public function index()
    {

        $emails = AlertEmail::first();



        return view('settings.alert_emails', compact('emails'));
    }

    public function update(EmailUpdateRequest $request)
    {

        $emails = AlertEmail::first();

        $update_email = $request->validated();

        $emails->update($update_email);

        return redirect()->route('dashboard')->with('success_message', 'Alert emails updated!');
    }
}
