@extends('common.master')
@section('content')

<div class="col-md-6 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('users.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">


                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="username"
                        value="{{ old('username') }}">
                </div>
                @error('username')
                    <p class="p-1 alert alert-danger">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email') }}">
                </div>
                @error('email')
                    <p class="p-1 alert alert-danger">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" name="password"
                        value="{{ old('password') }}">
                </div>
                @error('password')
                    <p class="p-1 alert alert-danger">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Retype Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" name="retype-password"
                        value="{{ old('retype-password') }}">
                </div>
                @error('retype-password')
                    <p class="p-1 alert alert-danger">{{ $message }}</p>
                @enderror


    

                <div class="form-group">
                    <label for="exampleInputEmail1">Role: </label>
                    <select name="role">
                        @foreach ($user_groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('role')
                    <p class="p-1 alert alert-danger">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Status: </label>
                    <select name="status">
                        <option value="1" selected>Enable</option>
                        <option value="0">Disable</option>
                    </select>
                </div>





                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card -->

    </form>
</div>
<!-- /.card -->
@endsection