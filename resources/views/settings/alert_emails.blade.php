@extends('common.master')
@section('content')


<div class="col-md-6 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update alert emails</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('settings.alert-emails-update') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Emails: <br><small class="alert alert-danger p-1">Seperate emails with a blank space.</small></label>
                    
                    <input type="text" class="form-control" id="exampleInputEmail1" name="emails" @if (!empty($emails->emails)) value="{{$emails->emails}}"
                        
                    @endif >
                </div>
                @error('emails')
                <p class="p-1 alert alert-danger">{{$message}}</p>
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