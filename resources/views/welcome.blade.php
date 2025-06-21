<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tiket Konser</title>
    <style>
      body {
        background-color: #f5f5f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      .ticket-card {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        background: white;
      }
      .ticket-img {
        height: 200px;
        object-fit: cover;
        width: 100%;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
      <div class="container">
        <a class="navbar-brand" href="#">TiketKonser</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <h2 class="mb-4 text-center">Konser Populer</h2>

      <div class="row">
        <div class="row">
          @foreach ($concerts as $concert)
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="ticket-card">
                <a href="{{ route('login') }}">
                <img src="{{ $concert->gambar }}" class="ticket-img" alt="{{ $concert->lokasi }}">
              </a>
                <div class="p-3">
                  <h5 class="mb-1">{{ $concert->judul }}</h5>
                  <p class="text-muted mb-1">⏰ {{ \Carbon\Carbon::parse($concert->waktu)->translatedFormat('d F Y') }} | 📍 {{ $concert->lokasi }}</p>
                  <p class="text-muted mb-2">🎤 Artis: {{ $concert->artis }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    
    <footer class="bg-dark text-white text-center py-3 mt-5">
      &copy; 2025 TiketKonser. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
