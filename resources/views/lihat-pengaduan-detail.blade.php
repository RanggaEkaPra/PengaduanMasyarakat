<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="komen.css"> <!-- Custom CSS -->
    <style>
        /* Global styles */
/* Global styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f7fc;
    margin: 0;
    padding: 0;
    color: #333;
}

.sidebar {
    background-color: #ffffff;
    border-right: 1px solid #ddd;
    height: 100vh;
    width: 250px;
    padding-top: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.sidebar .text-center h5 {
    color: #2c3e50;
    font-size: 1.2rem;
    margin-top: 10px;
}

.sidebar ul.nav {
    padding: 0;
}

.sidebar .nav-link {
    font-weight: 500;
    color: #555;
    padding: 12px 15px;
    border-radius: 5px;
    margin: 10px 0;
    display: flex;
    align-items: center;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.sidebar .nav-link i {
    margin-right: 10px;
    font-size: 1.3em;
    color: #007bff;
}

.sidebar .nav-link:hover {
    background-color: #007bff;
    color: #fff;
}

.sidebar .nav-link.text-danger:hover {
    background-color: #dc3545;
    color: #fff;
}

main {
    padding: 30px;
    background-color: #fff;
    flex-grow: 1;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

h3 {
    color: #2c3e50;
    font-weight: 600;
}

.card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #007bff;
}

.form-control {
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #3498db;
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.4);
}

/* General button styles */
.btn {
    font-weight: 600;
    border-radius: 8px;
    padding: 12px 25px;
    border: none;
    display: inline-block;
    transition: all 0.4s ease-in-out;
    width: auto;
    text-align: center;
}

/* Primary Button (blue) */
.btn-primary {
    background: linear-gradient(45deg, #007bff, #00aaff);
    color: #fff;
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
}

.btn-primary:hover {
    background: linear-gradient(45deg, #0056b3, #008cba);
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 123, 255, 0.4);
}

/* Success Button (green) */
.btn-success {
    background: linear-gradient(45deg, #28a745, #6dbf77);
    color: #fff;
    box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
}

.btn-success:hover {
    background: linear-gradient(45deg, #218838, #4cae4c);
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(40, 167, 69, 0.4);
}

/* Secondary Button (gray) */
.btn-secondary {
    background: linear-gradient(45deg, #6c757d, #adb5bd);
    color: #fff;
    box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
}

.btn-secondary:hover {
    background: linear-gradient(45deg, #5a6268, #8a9196);
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(108, 117, 125, 0.4);
}

/* Button Disabled state */
.btn:disabled {
    background: #d6d6d6;
    color: #aaa;
    box-shadow: none;
    cursor: not-allowed;
}

/* Focus state */
.btn:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}


/* Align buttons horizontally */
.form-group {
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

/* Make sure buttons don't overflow and align nicely */
.form-group .btn {
    flex: 1;
    text-align: center;
}

/* Adjust spacing between buttons in forms */
button[type="submit"] {
    margin-top: 10px;
}

/* Buttons inside the comment section */
section .btn {
    width: auto;
    margin-top: 10px;
    margin-right: 10px;
}

/* Align "Kembali" button under comments to the right */
section .btn-secondary {
    width: auto;
    display: inline-block;
    margin-top: 10px;
    margin-left: auto;
    margin-right: 0;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        border-right: none;
        box-shadow: none;
    }

    main {
        padding: 15px;
    }

    .form-group {
        flex-direction: column;
    }

    .btn {
        width: auto;
    }
}

    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="d-flex">
        
        <aside class="sidebar bg-light vh-100 p-3">
            <!-- User Profile Section -->
            <div class="text-center mb-4">
                <img src="ic.jpg" alt="Profile" class="rounded-circle mb-2" width="80" height="80">
                <h5 class="fw-bold">{{ Auth::user()->name }}</h5>
            </div>

            <!-- Sidebar Menu -->
            <nav>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link text-primary fw-bold">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('bikinPengaduan') }}" class="nav-link">
                            <i class="bi bi-pencil-square"></i> Pengaduan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('lihatPengaduan') }}" class="nav-link">
                            <i class="bi bi-eye"></i> Lihat Pengaduan
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="p-4 flex-grow-1">
            @if(request()->routeIs('bikinPengaduan'))
                <section>
                    <h3>Bikin Pengaduan</h3>
                    <form action="{{ route('storePengaduan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" name="kategori_id" required>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </section>
            @endif

            @if(request()->routeIs('lihatPengaduan'))
                <section>
                    <h3>Lihat Pengaduan</h3>
                    @foreach ($pengaduans as $pengaduan)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pengaduan->judul }}</h5>
                                <p class="card-text">{{ $pengaduan->deskripsi }}</p>
                                <img src="{{ asset('storage/' . $pengaduan->gambar) }}" class="img-fluid mb-2" alt="Pengaduan Image">
                                <form action="{{ route('addComment', $pengaduan->id) }}" method="POST">
                                    @csrf
                                    <textarea class="form-control" name="komentar" placeholder="Tambahkan komentar" required></textarea>
                                    <button type="submit" class="btn btn-success mt-2">Kirim Komentar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </section>
            @endif

            <section>
                <h3>{{ $pengaduan->judul }}</h3>
                <p><strong>Dibuat oleh:</strong> {{ $pengaduan->user->name }}</p>
                <p><strong>Kategori:</strong> {{ $pengaduan->kategori->name }}</p>
                <p>{{ $pengaduan->deskripsi }}</p>
                @if($pengaduan->gambar)
                    <img src="{{ asset('storage/' . $pengaduan->gambar) }}" class="img-fluid mb-3" alt="Gambar Pengaduan">
                @endif
                <p><small class="text-muted">Dibuat pada {{ $pengaduan->created_at->format('d M Y H:i') }}</small></p>

                <h4>Komentar</h4>
                @foreach ($pengaduan->komentars as $komentar)
                    <div class="card mb-2">
                        <div class="card-body">
                            <p><strong>{{ $komentar->user->name }}:</strong> {{ $komentar->komentar }}</p>
                        </div>
                    </div>
                @endforeach

                <form action="{{ route('addComment', $pengaduan->id) }}" method="POST">
                    @csrf
                    <textarea class="form-control" name="komentar" placeholder="Tambahkan komentar" required></textarea>
                    <button type="submit" class="btn btn-success mt-2">Kirim Komentar</button>
                    <a href="{{ route('lihatPengaduan') }}" class="btn btn-secondary mt-3">Kembali</a>
                </form>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
