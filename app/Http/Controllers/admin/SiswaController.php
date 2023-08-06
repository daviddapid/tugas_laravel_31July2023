<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return view('admin.siswa.index');
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function show($id)
    {
        return view('admin.siswa.detail', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.siswa.edit');
    }

    public function update(Request $request, $id)
    {
        dd($request, $id);
    }

    public function destroy($id)
    {
        dd($id);
    }
}
