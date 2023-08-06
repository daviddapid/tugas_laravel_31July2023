<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.project.index');
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function show($id)
    {
        return view('admin.project.detail', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.project.edit');
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
