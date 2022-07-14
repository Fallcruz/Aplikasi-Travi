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

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css" />
    <script type="text/javascript" src="/js/trix.js"></script>

    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
    </style>
  </head>
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
            <a class="nav-link" href="/destination">Destination</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="/event-festival">Event & Festival</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="/tour-package">Tour Package</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link active" href="/tour-package/create">Join Us</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link" href="/about">About</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="container-fluid bg-home-1">
      <div class="home-1">
        <h3 class="judul-home">Kembangkan Bisnis Anda Bersama Kami</h3>
        <p class="desc-home">
          Travi hadir untuk meningkatkan bisnis anda
        </p>
      </div>
    </div>
    <div class="container col-lg-6 mx-auto mt-5">
      <form method="POST" action="/tour-package" enctype="multipart/form-data">
        @csrf
        <h3 class="text-center mb-5">Isi Data</h3>
        <div class="row mb-4">
          <label class="col-sm-3 col-form-label">Nama/Perusahaan:</label>
          <div class="col-sm-9">
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required />
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-3 col-form-label">Nama Paket Tour:</label>
          <div class="col-sm-9">
            <input type="text" name="nama_paket" class="form-control @error('nama_paket') is-invalid @enderror" value="{{ old('nama_paket') }}" required />
            @error('nama_paket')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-3 col-form-label">Email:</label>
          <div class="col-sm-9">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required />
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-3 col-form-label">No.Telepon:</label>
          <div class="col-sm-9">
            <input type="text" name="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" value="{{ old('nomor_telepon') }}" required/>
            @error('nomor_telepon')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-3 col-form-label">Alamat:</label>
          <div class="col-sm-9">
            <textarea name="alamat" id="alamat" value="{{ old('alamat') }}" style="width: 100%;" required></textarea>
            @error('alamat')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-3 col-form-label">Kegiatan Wisata:</label>
          <div class="col-sm-9">
            <input id="kegiatan_wisata" type="hidden" name="kegiatan_wisata" value="{{ old('kegiatan_wisata') }}" required>
            <trix-editor input="kegiatan_wisata"></trix-editor>
            @error('kegiatan_wisata')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-3 col-form-label">Deskripsi:</label>
          <div class="col-sm-9">
            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}" required>
            <trix-editor input="deskripsi"></trix-editor>
            @error('deskripsi')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-3 col-form-label">Durasi:</label>
          <div class="col-sm-9">
            <input type="text" name="durasi" class="form-control @error('durasi') is-invalid @enderror" value="{{ old('durasi') }}" required/>
            @error('durasi')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-3 col-form-label">Pelayanan:</label>
          <div class="col-sm-9">
            <input id="pelayanan" type="hidden" name="pelayanan" value="{{ old('pelayanan') }}" required>
            <trix-editor input="pelayanan"></trix-editor>
            @error('pelayanan')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-3 col-form-label">Harga:</label>
          <div class="col-sm-9">
            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" />
            @error('harga')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-3 col-form-label">Gambar:</label>
          <div class="col-sm-9">
            <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="previewImage()">
            <img class="img-preview img-fluid mt-3 col-sm-5">
            @error('gambar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-9">
            <button class="btn btn-mulai">Mulai Sekarang</button>
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
