<?php

namespace App\Http\Controllers\features;

use App\Http\Controllers\Controller;
use App\Http\Requests\IssueSaveRequest;
use App\Models\Client;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Issues extends Controller
{
    public function index()
    {


        $issues = Issue::latest()->paginate(15);


        return view('features.issues.list', compact('issues'));
    }

    public function create()
    {

        return view('features.issues.create');
    }

    public function save(IssueSaveRequest $request)
    {

        if (empty(request('website'))) {
            return redirect()->route('issues.list')->with('error_message', 'Invalid Request!');
        }

        $input = $request->validated();

        $client = Client::where('website', 'LIKE', '%' . $request->website . '%')->first();
        if(empty($client->id)){
            session()->flash('website', $request->website);
            return redirect()->route('clients.create')->with('error_message', 'Add the client details first!');
        }
        $input['client_id'] = $client->id;

        $user = Auth::user();

        $input['updated_by'] = $user->username;

        Issue::create($input);

        return redirect()->route('issues.list')->with('success_message', 'Issue created!');
    }



    public function edit($id)
    {

        $issue = Issue::find(decrypt($id));



        return view('features.issues.edit', compact('issue'));
    }

    public function update()
    {

        if (empty(request('issue_id'))) {
            return redirect()->route('issues.list')->with('error_message', 'Invalid Request!');
        }

        $issue = Issue::find(request('issue_id'));
        $issue->update(request()->only('status', 'remarks'));

        return redirect()->route('issues.list')->with('success_message', 'Issue Updated!');
    }

    public function delete($id)
    {

        $issue = Issue::find(decrypt($id));

        if (!empty($issue)) {
            $issue->delete();



            return redirect()->route('issues.list')->with('error_message', 'Issue Deleted!');
        }

        return redirect()->route('issues.list')->with('error_message', 'Invalid Request!');
    }
}
