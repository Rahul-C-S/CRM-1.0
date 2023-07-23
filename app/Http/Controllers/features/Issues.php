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
   public function index(){

    if(cache()->has('issues')){
        $issues = cache()->get('issues');
    }else{
        $issues = Issue::latest()->paginate(15);
        cache()->put('issues', $issues);
    }
    return view('features.issues.list', compact('issues'));
   }

   public function create()
   {

       return view('features.issues.create');
   }

   public function save(IssueSaveRequest $request){

    $input = $request->validated();
  
    $client = Client::where('website', 'LIKE', '%'.$request->website.'%')->first();
    $input['client_id'] = $client->id;

    $user = Auth::user();

    $input['updated_by'] = $user->username;

    Issue::create($input);
    cache()->forget('issues');
    return redirect()->route('issues.list')->with('success_message', 'Issue created!');
   }
}
