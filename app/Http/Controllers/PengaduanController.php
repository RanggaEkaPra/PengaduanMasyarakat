<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\Pengaduan;
use App\Models\User;
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
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to submit a complaint.');
        }

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
        $userNik = auth()->user()->nik;

        if (!$userNik) {
            return redirect()->route('login')->with('error', 'You must have a valid NIK to submit a complaint.');
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

    public function index()
    {
        $pengaduans = Pengaduan::with('user', 'kategori', 'komentars.user',)->get();
        return view('lihatPengaduan', compact('pengaduans'));
    }
    public function admin()
    {
        if (auth()->user()->role == 'admin') {
            // Fetch complaints with user and category info for the admin
            $pengaduans = Pengaduan::with('user', 'kategori', 'komentars.user')->get();
            return view('dashboard_admin', compact('pengaduans'));
        }
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
            'user_nik' => auth()->user()->nik,              // ID user yang login
            'komentar' => $validated['komentar'],   // Isi komentar
        ]);

        // Redirect kembali ke halaman detail pengaduan
        return redirect()->route('pengaduan.show', $id)->with('success', 'Komentar berhasil ditambahkan.');
    }
    public function show($id)
    {
        $pengaduan = Pengaduan::with('user', 'kategori', 'komentars.user')->findOrFail($id);
        return view('lihat-pengaduan-detail', compact('pengaduan'));
    }
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();
        return redirect()->route('lihat-admin')->with('success', 'Pengaduan berhasil dihapus');
    }
}
