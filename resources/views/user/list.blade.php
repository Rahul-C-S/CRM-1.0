@extends('common.master')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <!-- /.card-header -->


                        <div class="card-header d-flex justify-content-end">
                            <div class="insert">
                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-dark">Insert</a>
                            </div>


                        </div>

                        @isset($users)
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $users->firstItem() + $loop->index }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->user_group->name }}</td>
                                                <td>{{ $user->status_text }}</td>
                                                <td style="width:150px;">
                                                    <a href="{{ route('users.edit', encrypt($user->id)) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{ route('users.delete', encrypt($user->id)) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>





                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                <br>
                                {{ $users->links() }}

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
