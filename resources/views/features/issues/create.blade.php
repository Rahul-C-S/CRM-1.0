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
                        <label for="exampleInputEmail1">Website(s)</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="website" @if (session()->has('website')) value="{{session()->get('website')}}" @else value="{{old('website')}}" @endif>
                    </div>
                    @error('website')
                        <p class="p-1 alert alert-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label for="exampleInputPassword1">Issue</label>
                       
                        <textarea class="form-control" id="exampleInputPassword1" name="issue" rows="5">{{old('issue')}}</textarea>
                    </div>
                    @error('issue')
                        <p class="p-1 alert alert-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label for="exampleInputPassword1">Remarks</label>
                        <br><small class="alert alert-danger" style="padding:2px;">If the client have multiple stores/websites, please specify the one with issue.</small><br>
                        <textarea class="form-control" id="exampleInputPassword1" name="remarks" rows="5">{{old('remarks')}}</textarea>
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
