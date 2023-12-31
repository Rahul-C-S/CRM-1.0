<?php

namespace App\Http\Controllers\features;

use App\Events\IssueCreatedEvent;
use App\Events\IssueUpdatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\CallerIdRequest;
use App\Http\Requests\IssueSaveRequest;
use App\Http\Requests\IssueUpdateRequest;
use App\Models\Client;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Rap2hpoutre\FastExcel\FastExcel as FastExcel;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;


class Issues extends Controller
{
    public function index()
    {


        $issues = Issue::paginate(10);

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
        if (empty($client->id)) {
            session()->flash('website', $request->website);


            return redirect()->route('clients.create')->with('error_message', 'Add the client details first!');
        }
        $input['client_id'] = $client->id;

        $user = Auth::user();

        $input['updated_by'] = $user->username;

        Issue::create($input);

        IssueCreatedEvent::dispatch($input);

        return redirect()->route('issues.list')->with('success_message', 'Issue created!');
    }



    public function edit($id)
    {
        try {
            $id = decrypt($id);
        } catch(\RuntimeException $e) {
            return redirect()->route('issues.list')->with('error_message', 'Invalid Request!');

        }

        $issue = Issue::find($id);



        return view('features.issues.edit', compact('issue'));
    }

    public function update(IssueUpdateRequest $request)
    {

        if (empty(request('issue_id'))) {
            return redirect()->route('issues.list')->with('error_message', 'Invalid Request!');
        }

        $issue = Issue::find(request('issue_id'));
        $input = $request->validated();

        $input['updated_by'] = auth()->user()->username;


        $issue->update($input);


        $client = Client::find($issue->client_id);

       

        IssueUpdatedEvent::dispatch($issue, $client->website);

        return redirect()->route('issues.list')->with('success_message', 'Issue Updated!');
    }

    public function delete($id)
    {
        try {
            $id = decrypt($id);
        } catch(\RuntimeException $e) {
            return redirect()->route('issues.list')->with('error_message', 'Invalid Request!');

        }
        

        $issue = Issue::find($id);

        if (!empty($issue)) {
            $issue->delete();



            return redirect()->route('issues.list')->with('error_message', 'Issue Deleted!');
        }

        return redirect()->route('issues.list')->with('error_message', 'Invalid Request!');
    }



    public function export()
    {

        $issues = Issue::latest()->get();
        return (new FastExcel($issues))->download('issues_' . date('d-m-y') . '.csv', function ($issues) {
            return [
                'Website' => $issues->client->website,
                'Issue' => $issues->issue,
                'Updated By' => $issues->updated_by,
                'Status' => $issues->status_text,
                'Created At' => date('D-M-Y', strtotime($issues->created_at)),
                'Updated At' => date('D-M-Y', strtotime($issues->updated_at)),
                'Remarks' => $issues->remarks,

            ];
        });
    }


    public function export_pdf()
    {
        $issues = Issue::latest()->get();
        $pdf = Pdf::loadView('exports.issues', ['issues' => $issues])->setPaper('a4', 'landscape');
        return $pdf->download('issues_' . date('d-m-y') . '.pdf');
    }


    public function callerId($number)
    {

        if (is_numeric($number)) {

            $clientDatas = Client::where('phone', 'LIKE', '%' . $number . '%')->limit(1)->get();



            if (count($clientDatas) <= 0) {

                session()->flash('phone', $number);
                return redirect()->route('clients.create')->with('error_message', 'Client data doesn\'t exist!');
            }

            foreach ($clientDatas as $data) {

                session()->flash('website', $data->website);
            }




            return view('features.callerid.callerid', compact('number', 'clientDatas'));
        }

        return redirect()->route('dashboard')->with('error_message', 'Invalid Request!');
    }


    public function pending(){

      
        $issues = Issue::where('status', '=', '1')->paginate(10);

        return view('features.issues.list', compact('issues'));
    }

    public function progress(){

      
        $issues = Issue::where('status', '=', '2')->paginate(10);

        return view('features.issues.list', compact('issues'));
    }

    public function resolved(){

      
        $issues = Issue::where('status', '=', '3')->paginate(10);

        return view('features.issues.list', compact('issues'));
    }



    
}
