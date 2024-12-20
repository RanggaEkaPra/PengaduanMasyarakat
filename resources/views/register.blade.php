<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>


    <!-- Main Content -->
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card login-card">
            <!-- Header -->
            <div class="card-header text-center">
                <h2 class="fw-bold">Daftar</h2>
                <p class="text-muted">Sistem Informasi Pengaduan Masyarakat</p>
            </div>

            <!-- Error Notification -->
            @if ($errors->any())
            <div id="messageBox" class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <!-- Success Notification -->
            @if (session('success'))
            <div id="successMessage" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Form -->
            <div class="card-body">
                <form action="/register" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Daftar</button>
                </form>
                <div class="text-center mt-3">
                    <p class="text-muted">Sudah punya akun? <a href="/login" class="link-primary">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
