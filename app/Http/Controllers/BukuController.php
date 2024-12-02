<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\createbuku;
use App\Models\Lomba;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Lomba::all();
        return view('books.index',[
            'data' => $data
        ]);
    }
    public function view()
    {
        $data = createbuku::all();
        return view('books.data', [
            'data'=>$data
        ]);
    }

    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'nama_penerbit' => 'required|string|max:255',
            'tahun_diterbitkan' => 'required|string|max:255',
            'jumlah_halaman' => 'nullable|string|max:255',
            'upload_file' => 'nullable|string|max:255',
            'upload_gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'judul_buku.required' => 'Judul Buku wajib diisi.',
            'nama_penerbit.required' => 'Nama penerbit wajib diisi.',
            'tahun_diterbitkan.required' => 'Tahun Diterbitkan wajib diisi.',
            'jumlah_halaman.required' => 'password wajib diisi.',
            'upload_file' => 'file wajib diisi',
            'upload_gambar.required' => 'Gambar wajib diisi.',
        ]);

        try {
    
            // Proses unggah gambar
        if ($request->hasFile('upload_gambar')) {
            $imagePath = $request->file('upload_gambar')->store('images', 'public'); // Simpan ke folder `storage/app/public/images`
        }
            // Simpan data ke database
            $data = new createbuku(); // Ganti dengan model yang sesuai
            $data->judul_buku = $validated['judul_buku'];
            $data->nama_penerbit = $validated['nama_penerbit'];
            $data->tahun_diterbitkan = $validated['tahun_diterbitkan'];
            $data->jumlah_halaman = $validated['jumlah_halaman'];
            $data->upload_file = $validated['upload_file'];
            $data->upload_gambar = $imagePath;
            $data->save();
    
            // Update status di tabel lain jika diperlukan
    
            return redirect()->route('form.buku')->with('successMessage', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('form.buku')->with(['errorMessage', 'Terjadi kesalahan: ' . $e->getMessage()]);
        
        }
    }
    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $data = createbuku::findOrFail($id);
        
        // Tampilkan view edit dengan data yang ditemukan
        return view('books.detail', [
            'data' => $data
        ]);
    }

    // public function isi($id) 
    // {
    //     $data = createbuku::findOrFail($id);
    //     return view('books.isi', [
    //         'data' => $data
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     */




    public function edit($id)
    {
        
            // Cari data berdasarkan ID
            $data = createbuku::findOrFail($id);
        
            // Tampilkan view edit dengan data yang ditemukan
            return view('books.edit1', [
                'data' => $data
            ]);
        
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input form
    $validated = $request->validate([
        'judul_buku' => 'nullable|string|max:255',
        'nama_penerbit' => 'nullable|string|max:255',
        'tahun_diterbitkan' => 'nullable|string|max:255',
        'jumlah_halaman' => 'nullable|string|max:255',
        'upload_file' => 'nullable|string|max:255',
        'upload_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {

       {

           
        // Cari buku berdasarkan ID
        $data = createbuku::findOrFail($id);

        // Update data buku
        $data->judul_buku = $validated['judul_buku'];
        $data->nama_penerbit = $validated['nama_penerbit'];
        $data->tahun_diterbitkan = $validated['tahun_diterbitkan'];
        $data->jumlah_halaman = $validated['jumlah_halaman'];
        $data->upload_file = $validated['upload_file'];
        $data->save();
        }
        // Redirect ke halaman list buku dengan pesan sukses
        return redirect()->route('data.buku')->with('successMessage', 'Data buku berhasil diperbarui.');
    } catch (\Exception $e) {
        // Jika terjadi kesalahan, redirect dengan pesan error
        return redirect()->route('data.buku')->with('errorMessage', 'Terjadi kesalahan: ' . $e->getMessage());
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Cari data berdasarkan ID
            $data = createbuku::findOrFail($id);
            
            // Hapus data dari database
            $data->delete();
    
            // Kirimkan flash message untuk konfirmasi
            return redirect()->route('data.buku')->with('successMessage', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kirimkan flash message error
            return redirect()->route('data.buku')->with('errorMessage', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
