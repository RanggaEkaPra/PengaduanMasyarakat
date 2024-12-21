<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin.css"> 
    <style>
        /* Further smaller card style */
        .card {
            max-width: 300px; /* Further reduce card width */
            margin: 10px auto; /* Center the card horizontally */
        }
        .card-body {
            padding: 0.75rem; /* Reduce padding for a more compact look */
        }
        .card-text img {
            max-width: 100%; /* Ensure the image is responsive */
            height: auto;
        }
        .btn {
            font-size: 0.875rem; /* Smaller button size */
        }
    </style>
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
            <!-- Lihat Pengaduan Section for Admin -->
            @if(request()->routeIs('lihat-admin'))
                <section>
                    <h3>Lihat Pengaduan</h3>
                    @foreach ($pengaduans as $pengaduan)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pengaduan->judul }}</h5>
                                <p class="card-text"><strong>Dibuat oleh:</strong> {{ $pengaduan->user->name }}</p>
                                <p class="card-text"><strong>Kategori:</strong> {{ $pengaduan->kategori->name }}</p>
                                <p class="card-text"><strong>Gambar:</strong> <img src="{{ asset('storage/' . $pengaduan->gambar) }}" alt="Gambar" class="img-fluid" width="150"></p>
                                <p class="card-text">{{ $pengaduan->deskripsi }}</p>
                                <a href="{{ route('pengaduan.show', $pengaduan->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                                <!-- Delete Pengaduan button -->
                                <form action="{{ route('deletePengaduan', $pengaduan->id) }}" method="POST" class="mt-3">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus Pengaduan</button>
                                </form>
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
