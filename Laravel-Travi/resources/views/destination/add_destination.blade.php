<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Village</title>
    <link rel="stylesheet" href="/css/join_us.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" type="text/css" href="/css/trix.css" />
    <script type="text/javascript" src="/js/trix.js"></script>

    <style>
      .btn-mulai:hover {
        color: white;
      }
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
    </style>
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
            <a class="nav-link active" href="/admin/destination">Destination</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="/admin/event-festival">Event & Festival</a>
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
    <div class="container-fluid bg-home-1" style="height: 100px;"></div>
    <div class="container col-lg-7 mx-auto mt-5">
      <h3 class="text-center mb-5">Destinations</h3>
      <form action="/admin/destination" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-4">
          <label class="col-sm-2 col-form-label">Judul:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" required value="{{ old('judul') }}"/>
            @error('judul')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-2 col-form-label">Lokasi:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="lokasi" id="lokasi" required value="{{ old('lokasi') }}"/>
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-2 col-form-label">Gambar:</label>
          <div class="col-sm-10">
            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" onchange="previewImage()"/>
            <img class="img-preview img-fluid mt-3 col-sm-5">
            @error('gambar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-2 col-form-label">Deskripsi</label>
          <div class="col-sm-10">
            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}"/>
            <trix-editor input="deskripsi"></trix-editor>
            @error('deskripsi')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
            <button class="btn btn-mulai" type="submit">Tambah Data</button>
          </div>
        </div>
      </form>
    </div>

    <br /><br /><br /><br /><br /><br /><br /><br />
    <script>
      // menonaktifkan file upload di trix-editor
      document.addEventListener("trix-file-accept", function (e) {
        // menonaktifkan file upload di trix-editor
        e.preventDefault();
      });

      function previewImage(){
        const image = document.querySelector('#gambar')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result
        }
      }
    </script>
  </body>
</html>
