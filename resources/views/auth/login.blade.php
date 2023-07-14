<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>MyTodo | Login</title>
        <link rel="icon" href="{{ asset('images/write.png') }}" type="image/x-icon">
    </head>

    <body>
        <main style="height: 100vh;" class="d-flex justify-content-center align-items-center">
            <div class="m-auto" style="width: 40vmax;">
                <header class="text-center flex-grow-1 w-100 mb-4">
                    <span class="light-logo"><img src="{{ asset('images/write.png') }}" height="50" alt="logo"></span>
                </header>

                <section class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-4 text-muted">Login</h4>
                        @if (session('registered'))
                        <div class="alert alert-success" role="alert">
                            Registration Successful!!
                        </div>
                        @endif
                        @if (session('message'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('message') }}
                        </div>
                        @endif
                        <form action="{{ route('auth.login') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Login</button>
                            </div>
                        </form>
                        <a href="{{ route('register') }}" class="text-center text-decoration-none d-inline-block mt-3">
                            Create an account
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
