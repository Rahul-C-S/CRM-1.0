@extends('common.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Search</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Search</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

   

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <!-- /.card-header -->


                        @isset($clients)
                        <br><h4 class="ml-4">Results: {{$clients->total()}}</h4>
                        <a href="{{route('clients.list')}}" class="ml-4 bg-dark text-light p-2" style="width: 100px"><strong>Go Back</strong></a>
                        <br>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Business Name</th>
                                            <th>Postcode</th>
                                            <th>Website</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td>{{ $clients->firstItem() + $loop->index }}</td>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->phone }}</td>
                                                <td>{{ $client->business_name }}</td>
                                                <td>{{ $client->postcode }}</td>
                                                <td>{{ $client->website }}</td>
                                                <td style="width:150px;">
                                                    <a href="{{ route('clients.edit', encrypt($client->id)) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{ route('clients.delete', encrypt($client->id)) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>





                                            </tr>
                                        @endforeach


                                    </tbody>

                                </table>
                                <br>
                                {{ $clients->links() }}
                                <p>Pages: {{ $clients->lastpage() }} </p>
                            </div>
                            <!-- /.card-body -->
                        @endisset


                    </div>
                    <!-- /.card -->


                    <!-- /.col -->
                </div>



            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection




