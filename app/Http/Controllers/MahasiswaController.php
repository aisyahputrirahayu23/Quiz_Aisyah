<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataMahasiswa'] = mahasiswa::all();
        return view('admin.mahasiswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'    => 'required',
            'nim'     => 'required|numeric',
            'email'   => 'required|email',
            'jurusan' => 'required',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nim.required'   => 'NIM wajib diisi.',
            'email.required'      => 'Email wajib diisi.',
            'email.email'         => 'Format email tidak valid.',
            'jurusan.required'      => 'Jurusan wajib diisi.',
            'alamat.numeric'       => 'Alamat harus berupa angka.',
        ]);

        // Simpan data jika validasi lolos
        mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataMahasiswa'] = mahasiswa::findOrFail($id);
        return view('admin.pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nim' => 'required|numeric',
            'email' => 'required|email',
            'jurusan' => 'required',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nim.required' => 'NIM wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'Alamat.numeric' => 'Alamat wajib diisi.',
        ]);

        // Ambil data pelanggan berdasarkan ID
        $mahasiswa = mahasiswa::findOrFail($id);

        // Update data menggunakan hasil validasi
        $mahasiswa->update($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);

        $mhasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Dihapus');
    }
}
