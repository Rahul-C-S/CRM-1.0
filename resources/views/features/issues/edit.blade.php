@extends('common.master')
@section('content')
    <div class="col-md-6 mt-4">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Issue</h3>
            </div>
            <!-- /.card-header -->
            <div class="issues" style="margin-left: 20px; margin-top: 20px">
            <h4>Website: {{$issue->client->website}}</h4>
            <h4>Issue: {{$issue->issue}}</h4>
        </div>

        <hr>
            <!-- form start -->
            <form action="{{ route('issues.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="issue_id" value="{{$issue->id}}">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Status: </label>
                        <select name="status" id="">
                            <option @selected($issue->status == 1) value="1">Pending</option>
                            <option @selected($issue->status == 2) value="2">In progress</option>
                            <option @selected($issue->status == 3) value="3">Resolved</option>
                        </select>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Remarks</label>
                        <textarea class="form-control" id="exampleInputPassword1" name="remarks" rows="5">{{$issue->remarks}}</textarea>
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
