<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\destinasi;
use App\Models\event;
use App\Models\pegawai;
use App\Models\comment;
use App\Models\kuliner;
use App\Models\budaya;
use App\Models\berita;

class admin extends Controller
{
    public function admin(){

        return view('admin.dashboard_admin', [
        'totalWisata' => destinasi::count(),
        'totalKuliner' => kuliner::count(),
        'totalBudaya' => budaya::count(),
        'totalAcara' => event::count(),
        'totalPegawai' => pegawai::count(),

        // aktivitas terbaru (ambil 3 terbaru tiap tabel)
        'latestWisata' => destinasi::latest()->take(2)->get(),
        'latestAcara' => event::latest()->take(2)->get(),
        'latestPegawai' => pegawai::latest()->take(2)->get(),
        'latestBudaya' => budaya::latest()->take(2)->get(),
        ]);

    }

    public function admin_destinasi(){
        $destinasi = destinasi::all();
        return view ('admin.admin_destinasi',[
            'destinasi'=> $destinasi
        ]);
    }

    public function store_destinasi(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
            'koordinat' => 'required',
            'jam_operasional' => 'required',
            'fasilitas' => 'required|array',
            'deskripsi_singkat' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data['fasilitas'] = implode(', ', $request->fasilitas);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('public'); // simpan ke storage
            $data['foto'] = $path;
        }

        destinasi::create($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update_destinasi(Request $request, $id)
    {
        $destinasi = destinasi::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
            'koordinat' => 'required',
            'jam_operasional' => 'required',
            'fasilitas' => 'required|array',
            'deskripsi_singkat' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data['fasilitas'] = implode(', ', $request->fasilitas);

        if ($request->hasFile('foto')) {
            // hapus gambar lama
            if ($destinasi->foto) {
                Storage::disk('public')->delete($destinasi->foto);
            }

            $file = $request->file('foto');
            $path = $file->store('destinasi', 'public');
            $data['foto'] = $path;
        }

        $destinasi->update($data);

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    // ✅ Hapus data
    public function destroy_destinasi($id)
    {
        destinasi::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }

    public function admin_acara(){
        $acara = event::all();
        foreach ($acara as $item) {

            $today = Carbon::today();

            $mulai = Carbon::parse($item->mulai);
            $akhir = Carbon::parse($item->akhir);

            if ($today->lt($mulai)) {

                // Sebelum mulai
                $item->status = 'Mendatang';
                $item->text = 'Jangan lewatkan acara menarik yang akan datang';

            } elseif ($today->between($mulai, $akhir)) {

                // Sedang berlangsung
                $item->status = 'Sedang Berlangsung';
                $item->text = 'Jangan lewatkan acara menarik yang akan datang';

            } else {

                // Setelah selesai
                $item->status = 'Selesai';
                $item->text = 'Acara telah selesai';
            }
        }
        return view ('admin.admin_acara',[
            'acara'=> $acara
        ]);
    }

    public function store_acara(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'mulai' => 'required',
            'akhir' => 'required',
            'koordinat' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('public'); // simpan ke storage
            $data['foto'] = $path;
        }

        event::create($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update_acara(Request $request, $id)
    {
        $acara = event::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'mulai' => 'required',
            'akhir' => 'required',
            'koordinat' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            // hapus gambar lama
            if ($acara->foto) {
                Storage::disk('public')->delete($acara->foto);
            }

            $file = $request->file('foto');
            $path = $file->store('public');
            $data['foto'] = $path;
        }

        $acara->update($data);

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    // ✅ Hapus data
    public function destroy_acara($id)
    {
        event::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }

    public function admin_pegawai(){
        $pegawai = pegawai::all();
        return view ('admin.admin_pegawai',[
            'pegawai'=> $pegawai
        ]);
    }

    public function store_pegawai(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('public'); // simpan ke storage
            $data['foto'] = $path;
        }

        pegawai::create($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update_pegawai(Request $request, $id)
    {
        $pegawai = pegawai::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            // hapus gambar lama
            if ($pegawai->foto) {
                Storage::disk('public')->delete($pegawai->foto);
            }

            $file = $request->file('foto');
            $path = $file->store('public');
            $data['foto'] = $path;
        }

        $pegawai->update($data);

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    // ✅ Hapus data
    public function destroy_pegawai($id)
    {
        pegawai::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }

    public function admin_kuliner(){
        $kuliner = kuliner::all();
        return view ('admin.admin_kuliner',[
            'kuliner'=> $kuliner
        ]);
    }

    public function store_kuliner(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'bahan_utama' => 'required',
            'jenis' => 'required',
            'video' => 'nullable',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->video) {

            $link = $request->video;

            $link = str_replace(
                "watch?v=",
                "embed/",
                $link
            );

            $link = str_replace(
                "youtu.be/",
                "youtube.com/embed/",
                $link
            );

            $data['video'] = $link;
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('public'); // simpan ke storage
            $data['foto'] = $path;
        }

        kuliner::create($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update_kuliner(Request $request, $id)
    {
        $kuliner = kuliner::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required',
            'bahan_utama' => 'required',
            'jenis' => 'required',
            'video' => 'nullable',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->video) {

            $link = $request->video;

            $link = str_replace(
                "watch?v=",
                "embed/",
                $link
            );

            $link = str_replace(
                "youtu.be/",
                "youtube.com/embed/",
                $link
            );

            $data['video'] = $link;
        }

        if ($request->hasFile('foto')) {
            // hapus gambar lama
            if ($kuliner->foto) {
                Storage::disk('public')->delete($kuliner->foto);
            }

            $file = $request->file('foto');
            $path = $file->store('public');
            $data['foto'] = $path;
        }

        $kuliner->update($data);

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    // ✅ Hapus data
    public function destroy_kuliner($id)
    {
        kuliner::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }

    public function admin_budaya(){
        $budaya = budaya::all();
        return view ('admin.admin_budaya',[
            'budaya'=> $budaya
        ]);
    }

    public function store_budaya(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'video' => 'nullable',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->video) {

            $link = $request->video;

            $link = str_replace(
                "watch?v=",
                "embed/",
                $link
            );

            $link = str_replace(
                "youtu.be/",
                "youtube.com/embed/",
                $link
            );

            $data['video'] = $link;
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('public'); // simpan ke storage
            $data['foto'] = $path;
        }

        budaya::create($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update_budaya(Request $request, $id)
    {
        $budaya = budaya::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'jenis' => 'nullable',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->video) {

            $link = $request->video;

            $link = str_replace(
                "watch?v=",
                "embed/",
                $link
            );

            $link = str_replace(
                "youtu.be/",
                "youtube.com/embed/",
                $link
            );

            $data['video'] = $link;
        }

        if ($request->hasFile('foto')) {
            // hapus gambar lama
            if ($budaya->foto) {
                Storage::disk('public')->delete($budaya->foto);
            }

            $file = $request->file('foto');
            $path = $file->store('public');
            $data['foto'] = $path;
        }

        $budaya->update($data);

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    // ✅ Hapus data
    public function destroy_budaya($id)
    {
        budaya::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }

    public function admin_berita(){
        $berita = berita::all();
        return view ('admin.admin_berita',[
            'berita'=> $berita
        ]);
    }

    public function store_berita(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi_singkat' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('public'); // simpan ke storage
            $data['foto'] = $path;
        }

        berita::create($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update_berita(Request $request, $id)
    {
        $berita = berita::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required',
            'deskripsi_singkat' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            // hapus gambar lama
            if ($berita->foto) {
                Storage::disk('public')->delete($berita->foto);
            }

            $file = $request->file('foto');
            $path = $file->store('public');
            $data['foto'] = $path;
        }

        $berita->update($data);

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    // ✅ Hapus data
    public function destroy_berita($id)
    {
        bberita::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }

    public function admin_komentar(){
        
        return view ('admin.admin_comment');
    }

    public function getcomment_admin()
    {
        return response()->json(
            comment::orderBy('id', 'asc')->get()
        );
    }

    public function storecomment_admin(Request $request)
    {
        $data = comment::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
            'role' => $request->role
        ]);

        // kirim balik ke JS
        return response()->json($data);
    }

    public function deletecommentByRange(Request $request)
    {
        $range = $request->range;

        if ($range === "all") {
            comment::truncate();

            return response()->json([
                'message' => 'Semua komentar berhasil dihapus'
            ]);
        }

        // hitung tanggal batas
        $tanggalBatas = Carbon::now()->subMonths($range);

        comment::where('created_at', '<=', $tanggalBatas)->delete();

        return response()->json([
            'message' => "Komentar lebih dari $range bulan berhasil dihapus"
        ]);
    }

}
