<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Village</title>
    <link rel="stylesheet" href="/css/event_festival_detail.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!--Navbar Atas-->
    <p id="img-value" style="display: none">{{ $event->gambar }}</p>
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
            <a class="nav-link" href="/admin/destination">Destination</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link active" href="/admin/event-festival"
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
    <div class="container bg-home-1" id="bg-home-1"></div>
    <div class="container mt-4 mb-5 title-home-1">
        <h3 class="mb-3">{{ $event->judul }}</h3>
        <div class="d-flex justify-content-start mb-3">  
          <div class="me-2">
            <a href="/admin/event-festival" class="btn btn-success"><span></span> Back to post</a>
          </div>
          <div class="me-2">
            <a href="/admin/event-festival/{{ $event->id }}/edit" class="btn btn-warning">Edit</a>
          </div>
          <div>
            <form action="/admin/event-festival/{{ $event->id }}" method="post">
              @csrf
              @method('delete')
              <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
            </form>
          </div>
        </div>
        <p>Lokasi : <i>{{ $event->lokasi }}</i></p>
        <p>{!! $event->deskripsi !!}</p>
    </div>

    <script>
      imgValue = document.getElementById('img-value').textContent
      imgUrl = "/Gambar/eventfestival/" + imgValue
      console.log(imgUrl);
      document.getElementById('bg-home-1').style.backgroundImage = `url("${imgUrl}")`; 
    </script>
  </body>
</html>
