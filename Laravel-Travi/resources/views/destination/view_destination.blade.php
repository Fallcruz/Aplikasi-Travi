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
    <p id="img-value">{{ $destination->gambar }}</p>
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
              <a class="nav-link active" href="/admin/destination">Destination</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="/admin/event-festival"
                >Event & Festival</a
              >
            </li>
            @if (session()->has('islogin'))
            <li class="nav-item me-3">
              <form action="/admin/logout" method="POST">
                  @csrf
                  <button class="btn btn-success">Logout</button>
              </form>
            </li>
          @endif
          </ul>
        </div>
      </div>
    <div class="container bg-artikel" id='bg-artikel'></div>
    <div class="container mt-4 mb-5 title-home-1">
        <h3 class="mb-3">{{ $destination->judul }}</h3>
        <div class="d-flex justify-content-start mb-3">  
            <div class="me-2">
              <a href="/admin/destination" class="btn btn-success">Back to post</a>
            </div>
            <div class="me-2">
              <a href="/admin/destination/{{ $destination->id }}/edit" class="btn btn-warning">Edit</a>
            </div>
            <div>
              <form action="/admin/destination/{{ $destination->id }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
              </form>
            </div>
          </div>
        <p>Lokasi : <i>{{ $destination->lokasi }}</i></p>
        <p>{!! $destination->deskripsi !!}</p>
    </div>
    <script>
      imgValue = document.getElementById('img-value').textContent
      imgUrl = "/Gambar/destinations/" + imgValue
      document.getElementById('bg-artikel').style.backgroundImage = `url("${imgUrl}")`; 
    </script>
</html>