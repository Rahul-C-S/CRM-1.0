@extends('common.master')
@section('content')
    <div class="caller-id border border-dark bg-dark ml-5 mt-4"
        style="height: auto; width:50%; border-radius: 3px; padding:10px;">

        <div class="calls-header bg-info" style="height: 150px;">
            <h1 class="text-center">Incoming Call</h1>
            <h2 class="text-center">{{ $number }}</h2>

        </div>
        <div class="calls-body bg-dark text-light m-4">
            @foreach ($clientDatas as $data)
                <h4>Name: {{ $data->name }}</h4>
                <h4>Email: {{ $data->email }}</h4>
                <h4>Website(s): {{ $data->website }}</h4>
                <h4>Business Name: {{ $data->business_name }}</h4>
                <br>
                <hr style="color: white">
            @endforeach
            <span>
                <a href="{{ route('issues.create') }}" class="btn btn-outline-warning"><strong> Raise an Issue/Request</strong></a>
                <a href="{{ route('issues.list') }}" class="btn btn-outline-danger ml-2"><strong> Cancel</strong></a>
            </span>


        </div>
    </div>
@endsection
