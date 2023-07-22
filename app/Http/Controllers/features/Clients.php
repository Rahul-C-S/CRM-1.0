<?php

namespace App\Http\Controllers\features;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientSaveRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Clients extends Controller
{
    public function index()
    {

        $clients = Client::latest()->paginate(15);
        return view('features.clients.list', compact('clients'));
    }

    public function create()
    {

        return view('features.clients.create');
    }

    public function save(ClientSaveRequest $request)
    {

        $input = $request->validated();

        Client::create($input);
        return redirect()->route('clients.list')->with('success_message', 'Client Added');
    }

    public function edit($client_id)
    {

        $client = Client::find(decrypt($client_id));


        return view('features.clients.edit', compact('client'));
    }

    public function update(ClientSaveRequest $request)
    {

        $input = $request->validated();

        $client = Client::find($request->client_id);

        $client->update($input);
        return redirect()->route('clients.list')->with('success_message', 'Client Updated');
    }


    public function delete($id)
    {
        $client = Client::find(decrypt($id));
        $client->delete();

        return redirect()->route('clients.list')->with('error_message', 'Client Deleted!');
    }



    public function search()
    {


        $clients = [];

        if (request('select') == 'store_name' and !empty(request('input'))) {
            $clients = Client::where('business_name', 'LIKE', '%' . request('input') . '%')->paginate();
        }
        if (request('select') == 'postcode' and !empty(request('input'))) {
            $clients = Client::where('postcode', 'LIKE', '%' . request('input') . '%')->paginate();
        }
        if (request('select') == 'phone' and !empty(request('input'))) {
            $clients = Client::where('phone', 'LIKE', '%' . request('input') . '%')->paginate();
        }




        return view('features.clients.search', compact('clients'));
    }


    public function suggestion()
    {
        $clients = [];

        if (request('select') == 'store_name' and !empty(request('input'))) {
            $clients = Client::where('business_name', 'LIKE', '%' . request('input') . '%')->get();
        }
        if (request('select') == 'postcode' and !empty(request('input'))) {
            $clients = Client::where('postcode', 'LIKE', '%' . request('input') . '%')->get();
        }
        if (request('select') == 'phone' and !empty(request('input'))) {
            $clients = Client::where('phone', 'LIKE', '%' . request('input') . '%')->get();
        }


        return json_encode($clients);

        return view('features.clients.search', compact('clients'));
    }

    
}
