<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Pengaduan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #825B32; /* Warna biru */
            color: #ffffff; /* Warna teks putih */
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #ffffff; /* Navbar putih */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-link {
            color: #007BFF;
        }

        .hero {
            text-align: center;
            padding: 5rem 2rem;
            background-color: #654520; /* Biru tua */
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 2rem;
        }

        .form-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .btn-primary {
            background-color: #825B32; /* Biru terang */
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1.2rem;
            border-radius: 30px;
        }

        .btn-secondary {
            background-color: transparent;
            color: #1E90FF;
            border: 2px solid #1E90FF;
            padding: 0.75rem 1.5rem;
            font-size: 1.2rem;
            border-radius: 30px;
        }

        .btn-primary:hover {
            background-color: #2B1700;
        }

        .btn-secondary:hover {
            background-color: #2B1700;
            color: white;
        }

        .illustration {
            margin-top: 3rem;
        }

        .illustration img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">e-Complaint</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Prosedur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Statistik</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Bantuan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="hero">
            <h1>Layanan Pengaduan Masyarakat!</h1>
            <div class="form-buttons">
                <form action="/register" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-primary">Daftar</button>
                </form>
                <form action="/login" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-secondary">Masuk</button>
                </form>
            </div>
            <div class="illustration">
                <img src="https://via.placeholder.com/800x400" alt="Ilustrasi pengaduan masyarakat">
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
