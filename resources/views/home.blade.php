<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Pengaduan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{asset('tentang.css')}}">
    <style>

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pengaduan Masyarakat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" id="home">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang-section">Tentang</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main id="main-container">
        <div class="hero">
            <div class="hero-content">
                <h1>Layanan Pengaduan Masyarakat!</h1>
                <p style="font-size: 1.2rem;">Ajukan pengaduan Anda secara mudah, cepat, dan efektif.</p>
                <div class="btn-container">
                    <form action="/login" method="POST" class="d-inline">
                        @csrf
                        <a href="{{ route('login') }}"  button type="submit" class="btn-secondary" style="text-decoration: none;">Lapor </a>
                    </form>
                </div>
            </div>
            <div class="hero-image">
            <img src="rmv.png" alt="Ilustrasi layanan pengaduan">

            </div>
        </div>
    </main>

    
    <div class="main-container" id="tentang-section">
        <h1>Fasilitas Yang Ada di Jatimulyo Kricak Tegalrejo</h1>
        <br>
        <a href="{{ route('explore') }}"  button type="submit" class="explore-button" style="text-decoration: none;">Explore </a>
        <div class="idea-grid">
            <!-- Card 1 -->
            <div class="idea-card">
                <img src="taman2.png" alt="Taman Jatimulyo">
                <div class="idea-title">Taman Jatimulyo</div>
            </div>
            <!-- Card 2 -->
            <div class="idea-card">
                <img src="pancuran.png" alt="Scandinavian bedroom">
                <div class="idea-title">Taman Segitiga</div>
            </div>
            <!-- Card 3 -->
            <div class="idea-card">
                <img src="gapura2.png" alt="Deck">
                <div class="idea-title">Gapura Jatimulyo</div>
            </div>
            <!-- Card 4 -->
            <div class="idea-card">
                <img src="masjid.png" alt="Drinks">
                <div class="idea-title">Masjid Baitul Karim</div>
            </div>
            <!-- Card 5 -->
            <div class="idea-card">
                <img src="kelurahan.png" alt="Bathroom">
                <div class="idea-title">Kelurahan Kricak</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

