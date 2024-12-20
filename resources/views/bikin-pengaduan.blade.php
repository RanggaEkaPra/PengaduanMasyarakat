<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title> <!-- Keep the same title as Dashboard -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="dasboarduser.css"> <!-- Custom CSS -->
</head>
<body>
    <!-- Sidebar -->
    <div class="d-flex">
        <aside class="sidebar bg-light vh-100 p-3">
            <!-- User Profile Section -->
            <div class="text-center mb-4">
                <img src="profile.jpg" alt="Profile" class="rounded-circle mb-2" width="80" height="80">
                <h5 class="fw-bold">{{ Auth::user()->name }}</h5>
                <br>
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
                            <i class="bi bi-pencil-square"></i>Pengaduan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('lihatPengaduan') }}" class="nav-link">
                            <i class="bi bi-eye"></i> Lihat Pengaduan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-file-earmark"></i> Documentation
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link text-danger border-0 bg-transparent fw-bold">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="p-4 flex-grow-1">
            <!-- Bikin Pengaduan Form -->
            <section>
                <h3>Pengaduan</h3>
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
                                <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
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
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"></script>
</body>
</html>
