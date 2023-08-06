<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index');
    }

    public function create()
    {
        return view('admin.contact.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function show($id)
    {
        return view('admin.contact.detail', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.contact.edit');
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
