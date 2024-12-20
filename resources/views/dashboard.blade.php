<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                            <i class="bi bi-pencil-square"></i> Pengaduan
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
            <!-- Dashboard Content -->
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
    <h4>Kategori Pengaduan yang Sering Digunakan</h4>
    <div class="card">
        <div class="card-body">
            <canvas id="categoryChart" width="400" height="200"></canvas>
        </div>
    </div>

    <!-- Pastikan Chart.js ditambahkan -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('categoryChart').getContext('2d');
        var categoryChart = new Chart(ctx, {
            type: 'line', // Tipe grafik (line)
            data: {
                labels: @json($categories->pluck('name')), // Nama kategori
                datasets: [{
                    label: 'Jumlah Pengaduan', // Label untuk grafik
                    data: @json($categories->pluck('pengaduans_count')), // Jumlah pengaduan per kategori
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.2)', // Warna latar belakang grafik
                    borderWidth: 2,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Kategori'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah Pengaduan'
                        },
                        beginAtZero: true // Memastikan Y-axis dimulai dari 0
                    }
                }
            }
        });
    </script>
</section>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
