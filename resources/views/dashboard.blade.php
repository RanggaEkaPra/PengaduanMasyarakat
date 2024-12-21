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
                <img src="ic.jpg" alt="Profile" class="rounded-circle mb-2" width="80" height="80">
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
    <!DOCTYPE html>
    <br><br><br>
    <br><br><br>
    <br><br><br>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Animasi Angka</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        /* Background styling */
        body {
            background: linear-gradient(135deg, #f0f4f8, #c2e9fb); /* Lembut biru ke putih */
            color: #333; /* Warna teks abu */
        }

        .container {
            background-color: #ffffff; /* Putih bersih */
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Bayangan ringan */
        }

        /* Title styling */
        .text-danger {
            font-weight: bold;
            font-size: 2.5rem;
            color: #2d7de0; /* Biru lembut */
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
        }

        /* Counter styling */
        .counter {
            font-size: 3.5rem;
            font-weight: bold;
            color: #2d7de0; /* Biru lembut */
            background: linear-gradient(90deg, #6dd5ed, #2193b0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent; /* Efek gradien */
        }

        /* Section title styling */
        .section-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            color: #555; /* Warna netral */
        }

        /* Grid item styling */
        .col {
            margin-bottom: 2rem;
        }

        /* Hover effect */
        .col:hover {
            background-color: rgba(45, 125, 224, 0.1);
            border-radius: 10px;
            padding: 1rem;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="text-center">
            <h1 class="text-danger">JUMLAH LAPORAN SEKARANG</h1>
            <div id="totalReports" class="counter">0</div>
        </div>

        <div class="row mt-4 text-center">
            @foreach ($categories as $category)
                <div class="col">
                    <div class="section-title">{{ $category->name }}</div>
                    <div id="category-{{ $category->id }}" class="counter">0</div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const animateValue = (id, start, end, duration) => {
            const obj = document.getElementById(id);
            const range = end - start;
            let startTime = null;

            const step = (timestamp) => {
                if (!startTime) startTime = timestamp;
                const progress = Math.min((timestamp - startTime) / duration, 1);
                obj.textContent = Math.floor(progress * range + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };

            window.requestAnimationFrame(step);
        };

        // Data kategori dari server
        const categories = @json($categories);

        // Total laporan
        const totalReports = categories.reduce((sum, category) => sum + category.pengaduans_count, 0);
        animateValue('totalReports', 0, totalReports, 1200); // Durasi lebih cepat (800ms)

        // Animasi untuk setiap kategori
        categories.forEach(category => {
            animateValue(`category-${category.id}`, 0, category.pengaduans_count, 1200); // Durasi lebih cepat (800ms)
        });
    });
</script>
<br><br><br>
<br><br><br>
<br><br><br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

