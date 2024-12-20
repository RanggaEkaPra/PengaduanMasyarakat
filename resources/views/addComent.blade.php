@if(request()->routeIs('lihatPengaduan'))
                <!-- Section for Lihat Pengaduan -->
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