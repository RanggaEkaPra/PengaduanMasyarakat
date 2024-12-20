<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="dasboarduser.css"> <!-- Custom CSS -->
    <style>
        /* Custom welcome message style */
        .welcome-message {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .welcome-message h3 {
            color: #007bff;
            font-weight: bold;
        }
        .welcome-message p {
            color: #555;
            font-size: 1.1rem;
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
                <br>
            </div>

            <!-- Sidebar Menu -->
            <nav>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="/dashboard_admin" class="nav-link text-primary fw-bold">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('lihat-admin') }}" class="nav-link">
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
            <!-- Welcome Section -->
            <div class="welcome-message">
                <h3>Selamat datang, {{ Auth::user()->name }}!</h3>
                <p>Anda berhasil login sebagai admin. Kelola pengaduan dan lakukan tindakan sesuai kebutuhan.</p>
            </div>

            <!-- Lihat Pengaduan Section -->
            @if(request()->routeIs('lihat-admin') || request()->routeIs('lihatPengaduan'))
                <section>
                    <h3>Lihat Pengaduan</h3>
                    @foreach ($pengaduans as $pengaduan)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pengaduan->judul }}</h5>
                                <p class="card-text">{{ $pengaduan->deskripsi }}</p>
                                <img src="{{ asset('storage/' . $pengaduan->gambar) }}" class="img-fluid mb-2" alt="Pengaduan Image">

                                <!-- Delete button for admin -->
                                @if(auth()->user()->role == 'admin')
                                    <form action="{{ route('deletePengaduan', $pengaduan->id) }}" method="POST" class="mt-3">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus Pengaduan</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </section>
            @endif
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
