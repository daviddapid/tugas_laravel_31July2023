<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Siswa extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    static function _store(Request $request)
    {
        $s = new Siswa();
        $s->name = $request->name;
        $s->about = $request->about;

        $file_name =  time() . '-' . $request->file('photo')->getClientOriginalName();
        $s->photo = $request->file('photo')->storeAs('siswa', $file_name);
        $s->save();
    }
    static function _update(Request $request, Siswa $siswa)
    {
        if ($request->file('photo') != null) {
            // delete photo
            Storage::delete($siswa->photo);

            // save new photo
            $siswa->photo = $request->file('photo')->store('siswa');
        }
        $siswa->name = $request->name;
        $siswa->about = $request->about;
        $siswa->save();
    }
}
