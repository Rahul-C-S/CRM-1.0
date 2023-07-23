@extends('common.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Issues ({{ $issues->total() }}) </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Issues</li>
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


                        <div class="card-header d-flex justify-content-end">
                            <div class="insert">
                                <a href="{{ route('issues.create') }}" class="btn btn-sm btn-dark">Insert</a>
                            </div>
                            <h4 class="ml-4 mr-2">Export:</h4>
                            <div class="export">
                                <a href="{{ route('issues.export-pdf') }}" class="btn btn-sm btn-dark">PDF</a>
                                <a href="{{ route('issues.export') }}" class="btn btn-sm btn-dark">CSV</a>
                            </div>

                        </div>

                        @isset($issues)
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Website</th>
                                            <th>Issue/Request</th>
                                            <th>Updated By</th>
                                            <th>Remarks</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($issues as $issue)
                                            <tr>
                                                <td>{{ $issues->firstItem() + $loop->index }}</td>
                                                <td>{{ $issue->client->website }}</td>
                                                <td>{{ $issue->issue }}</td>
                                                <td>{{ $issue->updated_by }}</td>
                                                <td>{{ $issue->remarks }}</td>
                                                <td>{{ $issue->status_text }}</td>
                                                <td>{{ $issue->created_at }}</td>
                                                <td style="width:150px;">
                                                    <a href="{{ route('issues.edit', encrypt($issue->id)) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{ route('issues.delete', encrypt($issue->id)) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>





                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                <br>
                                {{ $issues->links() }}
                                <p>Pages: {{ $issues->lastpage() }} </p>
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
