<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all(['id', 'name']);
        return view('admin.project.index', compact('siswas'));
    }

    public function myCreate(Siswa $siswa)
    {
        return view('admin.project.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'project_name' => 'required|min:3',
                'project_date' => 'required',
                'photo' => 'required|image'
            ],
            [
                'required' => 'kolom :attribute harus diisi',
                'min' => 'kolom :attribute minimal :min karakter',
            ]
        );
        $p = new Project();
        $p->siswa_id = $request->siswa_id;
        $p->project_name = $request->project_name;
        $p->project_date = $request->project_date;
        $filename = time() . '-' . $request->file('photo')->getClientOriginalName();
        $p->photo = $request->file('photo')->storeAs('project', $filename);
        $p->save();

        return back()->with('success', 'Sukses menambah data');
    }

    public function show($id)
    {
        $projects = Siswa::query()->find($id)->projects;
        return view('admin.project.detail', compact('projects'));
    }

    public function edit(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate(
            [
                'project_name' => 'required|min:3',
                'project_date' => 'required',
                'photo' => 'image'
            ],
            [
                'required' => 'kolom :attribute harus diisi',
                'min' => 'kolom :attribute minimal :min karakter',
            ]
        );
        $project->siswa_id = $request->siswa_id;
        $project->project_name = $request->project_name;
        $project->project_date = $request->project_date;
        if ($request->file('photo') != null) {
            // delete photo
            Storage::delete($project->photo);

            // save new photo
            $filename = time() . '-' . $request->file('photo')->getClientOriginalName();
            $project->photo = $request->file('photo')->storeAs('project', $filename);
        }
        $project->save();

        return back()->with('success', 'Sukses menambah data');
    }

    public function destroy(Project $project)
    {
        Storage::delete($project->photo);
        $project->delete();
    }
}
