<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login Page</title>
</head>

<body>
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Reset Password</h2>

                                @if (Session::has('fail'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        {{ session()->get('fail') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <form action="{{ url('reset-password-now') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="token" value="{{$token}}">
                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id="form3Example3cg"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" name="email" for="form3Example3cg">Your
                                            Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id="form3Example4cg"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cg">Enter New Password</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password_confirmation" id="form3Example4cdg"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cdg">Confirm password</label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <input type="submit" value="Reset Now"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Dont Have an account? <a
                                            href="{{ url('register_view') }}" class="fw-bold text-body"><u>Register
                                                here</u></a></p>
                                    <p class="text-center text-muted mt-5 mb-0">Forgot Password? <a
                                            href="{{ url('forget-password') }}" class="fw-bold text-body"><u>
                                                Reset</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
