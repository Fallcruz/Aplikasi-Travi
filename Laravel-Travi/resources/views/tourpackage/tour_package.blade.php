<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tour Package</title>
    <link rel="stylesheet" href="/css/index.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>
  <style>
    .carddes {
      padding-top: 1cm;
    }
  </style>
  <body>
    <!--Navbar Atas-->
    @include('tourpackage.partials.navbar')
    <div class="container">
      <div class="row mb-4">
        @foreach ($packages as $package)
          <div class="col-6">
            <div class="carddes"></div>
            <div class="card mx-auto" style="width: 30rem;">
              <img
                src="/Gambar/Tour Package/{{ $package->gambar }}"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title text-center">
                  {{ $package->nama_paket }} | {{ $package->nama }} 
                </h5>
                <p class="card-text">
                  {{$package->excerpt}}
                </p>
                <p class="card-text"><b>Harga:</b> Rp {{ number_format($package->harga,0,',','.')  }}</p>
                <p class="card-text"><b>No telepon:</b> {{ $package->nomor_telepon }}</p>
                <p class="card-text"><b>Durasi:</b> {{ $package->durasi }}</p>
                <a href="/tour-package/{{ $package->slug }}" class="" style="float: right;"
                  >Lihat detail</a
                >
              </div>
            </div>
          </div>
        @endforeach
        
      </div>
    </div>
  </body>
</html>
