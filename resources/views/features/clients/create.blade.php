@extends('common.master')
@section('content')
    <div class="col-md-6 mt-4">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Client</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('clients.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                    </div>

                    @error('name') <p class="p-1 alert alert-danger">{{ $message }}</p> @enderror


                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="email">
                    </div>
                    @error('email') <p class="p-1 alert alert-danger">{{ $message }}</p> @enderror

                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="phone">
                    </div>
                    @error('phone') <p class="p-1 alert alert-danger">{{ $message }}</p> @enderror

                    <div class="form-group">
                        <label for="exampleInputEmail1">Postcode</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="postcode">
                    </div>
                    @error('postcode') <p class="p-1 alert alert-danger">{{ $message }}</p> @enderror

                    <div class="form-group">
                        <label for="exampleInputEmail1">Business Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="business_name">
                    </div>
                    @error('business_name') <p class="p-1 alert alert-danger">{{ $message }}</p> @enderror


                    <div class="form-group">
                        <label for="exampleInputEmail1">Website</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="website">
                    </div>
                    @error('website') <p class="p-1 alert alert-danger">{{ $message }}</p> @enderror


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
