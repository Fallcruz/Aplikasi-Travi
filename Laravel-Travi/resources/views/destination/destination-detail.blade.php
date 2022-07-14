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
    #img-value {
      display: none;
    }
    .bg-artikel {
      color: white;
      height: 300px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
  <body>
    <p id="img-value">{{ $desti->gambar }}</p>
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
    <div class="container bg-artikel" id='bg-artikel'></div>
    <div class="container mt-4 mb-5 title-home-1">
        <h3 class="mb-4">{{ $desti->judul }}</h3>
        <p>Lokasi : <i>{{ $desti->lokasi }}</i></p>
        <p>{!! $desti->deskripsi !!}</p>
        <a href="/destination">Back to post</a>
    </div>
    <script>
      imgValue = document.getElementById('img-value').textContent
      imgUrl = "/Gambar/destinations/" + imgValue
      document.getElementById('bg-artikel').style.backgroundImage = `url("${imgUrl}")`; 
    </script>
</html>