<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();

        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        Siswa::_store($request);

        return back()->with('success', 'Sukses menambahkan data baru');
    }

    public function show(Siswa $siswa)
    {
        return view('admin.siswa.detail', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        Siswa::_update($request, $siswa);

        return back()->with('success', 'Sukses memperbarui data');
    }

    public function destroy(Siswa $siswa)
    {
        Storage::delete($siswa->photo);
        $siswa->delete();

        return back()->with('success', 'Sukses menghapus data');
    }
}
