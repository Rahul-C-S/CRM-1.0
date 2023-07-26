<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {

        $issues_pending = count(Issue::where('status', '=', 1)->get());
        $issues_in_progress = count(Issue::where('status', '=', 2)->get());
        $issues_resolved = count(Issue::where('status', '=', 3)->get());



        return view('common.dashboard', compact('issues_pending', 'issues_in_progress', 'issues_resolved'));
    }
}
