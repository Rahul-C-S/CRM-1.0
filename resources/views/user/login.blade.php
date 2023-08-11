<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<div style="background: linear-gradient(to right, #b10168, #000000);">
    

    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
             
                <div class="col-md-8 col-lg-6 col-xl-4 bg-light p-2 rounded-1">
                    <h1 class="text-center bg-dark text-light p-1 rounded-1">Login</h1>

                    @if (session()->has('error_message'))

                    <p class="alert alert-danger p-1 text-center">{{session()->get('error_message')}}</p>
                        
                    @endif
                    <form action="{{route('do.login')}}" method="POST">
                        @csrf
                       

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="form3Example3" class="form-control form-control-lg rounded-1" name="username" />
                            <label class="form-label" for="form3Example3"><strong>Username</strong></label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="form3Example4" class="form-control form-control-lg rounded-1" name="password" />
                            <label class="form-label" for="form3Example4"><strong>Password</strong></label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2 rounded-1" type="checkbox" value="1" id="form2Example3" name="remember_me" />
                                <label class="form-check-label" for="form2Example3">
                                    <strong> Remember me!</strong>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-outline-dark fw-bold rounded-1">Login</button>
                        </div>

                     

                    </form>
                </div>
            </div>
        </div>
        
    </section>


    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
    

