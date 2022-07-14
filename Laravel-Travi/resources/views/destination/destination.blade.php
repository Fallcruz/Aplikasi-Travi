<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Village</title>
    <link rel="stylesheet" href="/css/index.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>
  <style>
    .cardkanan {
      float: right;
      margin-right: 30px;
      margin-bottom: 1cm;
    }
    .cardkiri {
      margin-left: 30px;
      margin-bottom: 1cm;
    }
    .carddes {
      padding-top: 1cm;
    }
    .bg-home-1 {
      color: black;
      background-image: url("/Gambar/destinasi.png");
      height: 100px;
      background-position: top;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
  <body>
    <!--Navbar Atas-->
    <div class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid px-4">
        <a class="travi navbar-brand ms-2" href="/">
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
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link active" href="/destination">Destination</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="/event-festival">Event & Festival</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="/tour-package">Tour Package</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="/tour-package/create">Join Us</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link" href="/about">About</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="container-fluid bg-home-1"></div>
    <div class="container mt-4 title-home-1">
      <h4 class="mb-4">Destination</h4>
    </div>

    <div class="container">
      <div class="row">
        @foreach ($list as $event)
          <div class="col-6">
            <div class="card mx-auto mb-3" style="width: 32rem;">
              <img
                src="/Gambar/destinations/{{ $event->gambar }}"
                class="card-img-top"
                style="height: 300px"
              />
              <div class="card-body">
                <h5 class="card-title text-center">
                  {{ $event->judul }}
                </h5>
                <p class="card-text">
                  <b>Lokasi :</b> <i>{{ $event->lokasi }}</i><br>
                  {{ $event->excerpt }}
                </p>
                <a href="/destination/{{ $event->id }}" class="" style="float: right;">Lihat detail</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </body>
</html>
