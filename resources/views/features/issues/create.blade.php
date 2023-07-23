@extends('common.master')
@section('content')
    <div class="col-md-6 mt-4">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Issue/Request</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('issues.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">


                    <div class="form-group">
                        <label for="exampleInputEmail1">Website</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="website">
                    </div>
                    @error('website')
                        <p class="p-1 alert alert-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label for="exampleInputPassword1">Issue</label>
                        <textarea class="form-control" id="exampleInputPassword1" name="issue" rows="5"></textarea>
                    </div>
                    @error('issue')
                        <p class="p-1 alert alert-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label for="exampleInputPassword1">Remarks</label>
                        <textarea class="form-control" id="exampleInputPassword1" name="remarks" rows="5"></textarea>
                    </div>
                    @error('remarks')
                        <p class="p-1 alert alert-danger">{{ $message }}</p>
                    @enderror



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
