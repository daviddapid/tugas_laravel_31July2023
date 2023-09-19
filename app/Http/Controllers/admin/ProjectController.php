<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Siswa;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all(['id', 'name']);
        return view('admin.project.index', compact('siswas'));
    }

    public function create()
    {
        $siswas = Siswa::all('id', 'name');
        return view('admin.project.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $p = new Project();
        $p->siswa_id = $request->siswa_id;
        $p->project_name = $request->project_name;
        $p->project_date = $request->project_date;
        $filename = time() . '-' . $request->file('photo')->getClientOriginalName();
        $p->photo = $request->file('photo')->storeAs('project', $filename);
        $p->save();

        return back();
    }

    public function show($id)
    {
        $projects = Siswa::query()->find($id)->projects;
        return $projects;
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
