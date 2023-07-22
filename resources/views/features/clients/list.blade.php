@extends('common.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Clients ({{ $clients->total() }}) </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Clients</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- SidebarSearch Form -->
    <div class="form-inline ml-5">
        <form action="{{ route('clients.search') }}" method="POST" id="form">
            @csrf
            <div class="input-group">
                <select class="form-select select" aria-label="Default select example" name="select" id="select">
                    <option selected value="store_name">Store Name</option>
                    <option value="postcode">Postcode</option>
                    <option value="phone">Phone</option>
                </select>
                <input class="form-control ml-4" type="search" placeholder="Search" aria-label="Search" name="input"
                    id="searchText">
                <div>
                    <button class="btn btn-sidebar" type="submit">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                    <div id="searchResults"></div>
                </div>
            </div>
        </form>
    </div>

    <hr>



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <!-- /.card-header -->


                        <div class="card-header d-flex justify-content-end">
                            <div class="insert">
                                <a href="{{ route('clients.create') }}" class="btn btn-sm btn-dark">Insert</a>
                            </div>
                            <h4 class="ml-4 mr-2">Export:</h4>
                            <div class="export">
                                <a href="" class="btn btn-sm btn-dark">PDF</a>
                                <a href="" class="btn btn-sm btn-dark">CSV</a>
                            </div>

                        </div>



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



                    </div>
                    <!-- /.card -->


                    <!-- /.col -->
                </div>



            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
<script src="{{ asset('js/jquery.min.js') }}"></script>

<style>
    #searchResults{ text-align: center; font-size:20px; border: 1px solid black;color: black; border-radius: 5px; position: absolute; z-index: 2; background: white; display: block; width: max-content; left: 150px; margin-top: 15px; }
    hr{margin: 0 !important;}
</style>

<script>
    $(document).ready(function() {
        $("#searchText").keyup(function() {
            var searchText = $(this).val();
            var select = $('#select').val();
           
            // console.log(searchText);
            if (searchText != null && searchText != '' && searchText !== 'undefined') {


                $.ajax({
                    url: "clients/suggestion",
                    type: "POST",
                    data: $('#form').serialize(),
                    success: function(response) {
                        
                        var customer = '';

                        var obj = JSON.parse(response);

                        if (Object.keys(obj).length > 0) {
                            for (i = 0; i < Object.keys(obj).length; i++) {

                                if (select == 'store_name') {
                                    customer +=
                                        '<a href="#" id="choose" onclick="assign(\'' + obj[
                                            i].business_name + '\')">' + obj[i].business_name +
                                        '</a><br><hr>'

                                }

                                if (select == 'postcode') {
                                    customer +=
                                        '<a href="#" id="choose" onclick="assign(\'' + obj[
                                            i].postcode + '\')">' + obj[i].postcode + '</a><br><hr>'
                                }

                                if (select == 'phone') {
                                    customer +=
                                        '<a href="#" id="choose" onclick="assign(\'' + obj[
                                            i].phone + '\')">' + obj[i].phone + '</a><br><hr>'
                                }


                            }


                        }


                        //console.log(customer);
                        $("#searchResults").html(customer);
                        $("#searchResults").css("border", "1px solid black");


                    },
                });
            } else {
                $("#searchResults").html('');
                $("#searchResults").css("border", "0");
            }
        });
    });

    function assign(val) {
        //var val = document.querySelector('#choose').value;
        console.log(val);
        document.querySelector('#searchText').value = val;

    }
</script>


