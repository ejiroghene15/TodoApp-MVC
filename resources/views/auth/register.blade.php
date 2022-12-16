<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>My Todo | Register</title>
    <link rel="shortcut icon" href="{{ asset('images/write.png') }}" type="image/x-icon">
</head>

<body>

    <main style="height: 100vh;" class="d-flex justify-content-center align-items-center flex-wrap">
        <header class="text-center flex-grow-1 w-100" style="margin-bottom: -100px">
            <span class="light-logo"><img src="{{ asset('images/write.png') }}" height="50" alt="logo"></span>
        </header>
        <div class="m-auto" style="width: 40vmax;">
            <section class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4 text-muted">Create an Account</h4>
                    <form action="{{ route('signup') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="first_name"
                                value="{{ old('first_name') }}">
                            @error('first_name')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                            @error('last_name')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Email Address</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Register</button>
                        </div>
                    </form>
                    <a href="{{ route('login') }}" class="text-center text-decoration-none d-inline-block mt-3">
                        Login to your account
                    </a>
                </div>
            </section>
        </div>
    </main>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
