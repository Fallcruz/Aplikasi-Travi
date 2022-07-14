<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Village</title>
    <link rel="stylesheet" href="/css/login.css" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
    />
</head>
<body>
    <!--Navbar Atas-->
    <div class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid px-4">
            <a class="travi navbar-brand ms-2">
                <img
                    src="/Gambar/daun.png"
                    width="30px"
                    class="d-inline-block mb-3"
                    alt=""
                />
                Travi
            </a>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item me-3">
                    <a class="nav-link" href="/">Home User</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link active" href="/admin/login">Login</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid bg-home-1"></div>
    <section class="container login-view col-4 mx-auto mt-5">
        <form action="/admin/login" method="post">
            @csrf
            <h2 class="text-center">Login</h2>
            @if(session()->has('failed'))
                <div class="alert alert-danger mt-3" role="alert">
                    {{ session('failed') }}
                </div>
            @endif
            <div class="my-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="my-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" id="password" class="form-control">
            </div>
            <div class="d-flex mt-4">
                <button name="submit" type="submit" class="btn btn-mulai">Login</button>
            </div>
        </form>
    </section>
</body>
</html>