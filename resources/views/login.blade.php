<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <!-- Include Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Main Content -->
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card login-card position-relative">
            <!-- Back to Home Icon (in top-left corner) -->
            <a href="/" class="position-absolute top-0 start-0 p-3">
                <i class="fas fa-arrow-left fa-lg"></i>
            </a>

            <!-- Header -->
            <div class="card-header text-center">
                <h2 class="fw-bold">Login</h2>
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
            @if (session('success'))
            <div id="successMessage" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <!-- Form -->
            <div class="card-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3 position-relative">
                        <input type="text" name="login_identifier" class="form-control ps-5" placeholder="Email atau NIK" required>
                        <i class="fas fa-envelope position-absolute top-50 start-0 translate-middle-y ps-3 text-muted"></i>
                    </div>
                    <div class="mb-3 position-relative">
                        <input type="password" name="password" class="form-control ps-5" placeholder="Password" required>
                        <i class="fas fa-lock position-absolute top-50 start-0 translate-middle-y ps-3 text-muted"></i>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </form>
                <div class="text-center mt-3">
                    <p class="text-muted">Belum punya akun? <a href="/register" class="link-primary">Daftar di sini</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
