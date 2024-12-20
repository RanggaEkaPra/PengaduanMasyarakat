<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function dashboard()
    {
        $categories = Kategori::withCount('pengaduans')->get();

        // Pass the data to the dashboard view
        return view('dashboard', compact('categories'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('bikin-pengaduan', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'foto' => 'nullable|image|max:2048',
            'tanggal_pengaduan',
        
        ]);

        $path = null; // Inisialisasi $path
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('uploads', 'public');
        }

        Pengaduan::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'kategori_id' => $validated['kategori_id'],
            'gambar' => $path,
            'user_nik' => auth()->user()->nik,
            'user_id' => auth()->id(),
            'tanggal_pengaduan' => now()->toDateString(), 
        ]);

        return redirect()->route('lihatPengaduan')->with('success', 'Pengaduan berhasil dibuat.');
    }

    // Pengaduan.php (Model)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function index()
    {
        $pengaduans = Pengaduan::with('user', 'kategori', 'komentars.user',)->get();
        return view('lihatPengaduan', compact('pengaduans'));
    }
    public function kurva()
{
    // Fetch the categories and the count of pengaduans related to each category
    $categories = Kategori::withCount('pengaduans')->get();

    // Return the chart data for the dashboard
    return view('dashboard', compact('categories'));
}

    public function addComment(Request $request, $id)
    {
        // Validasi input komentar
        $validated = $request->validate([
            'komentar' => 'required|max:255',
        ]);
    
        // Menyimpan komentar ke dalam database
        Komentar::create([
            'pengaduan_id' => $id,                  // ID pengaduan yang dikomentari
            'user_id' => auth()->id(),              // ID user yang login
            'komentar' => $validated['komentar'],   // Isi komentar
        ]);
    
        // Redirect kembali ke halaman detail pengaduan
        return redirect()->route('pengaduan.show', $id)->with('success', 'Komentar berhasil ditambahkan.');
    }
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function show($id)
{
    $pengaduan = Pengaduan::with('user', 'kategori', 'komentars.user')->findOrFail($id);
    return view('lihat-pengaduan-detail', compact('pengaduan'));
}



}
