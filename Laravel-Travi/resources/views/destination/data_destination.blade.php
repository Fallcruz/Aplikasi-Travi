<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Village</title>
    <link rel="stylesheet" href="/css/data_destination.css" />
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
    <div class="container-fluid bg-home-1"></div>
    <div class="container mt-4 title-home-1">
      <h4 class="mb-4">Data Destination</h4>
      <a
        class="btn-mulai px-3 py-2 align-self-center"
        href="/admin/destination/create"
        role="button"
        >Tambah</a
      >
      @if(session()->has('success'))
        <div class="alert alert-success mt-3" role="alert">
          {{ session('success') }}
        </div>
      @endif
    </div>
    <div class="container">
      <div class="table-responsive-lg">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Judul</th>
              <th scope="col">Slug</th>
              <th scope="col">Excerpt</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Gambar</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($destination as $destinations)
            <tr>
              <th scope="row">{{ $destinations->id }}</th>
              <td>{{ $destinations->judul }}</td>
              <td>{{ $destinations->slug }}</td>
              <td>{!! $destinations->excerpt !!}</td>
              <td>{{ $destinations->lokasi }}</td>
              <td>{{ $destinations->gambar }}</td>
              <td>
                <div class="text-center">  
                  <div class="mb-2">
                    <a href="/admin/destination/{{ $destinations->id }}" class="btn btn-success">View</a>
                  </div>
                  <div class="mb-2">
                    <a href="/admin/destination/{{ $destinations->id }}/edit" class="btn btn-warning">Edit</a>
                  </div>
                  <div>
                    <form action="/admin/destination/{{ $destinations->id }}" method="post">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <br /><br /><br /><br /><br /><br /><br /><br />
  </body>
</html>
