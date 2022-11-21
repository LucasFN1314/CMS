<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $req) {
        // Get file string name and save on db the original name
        $index = explode("/", $req->file('file')->store('docs'))[1];
        $name = $req->file('file')->getClientOriginalName();

        $file = new File();
        $file->index = $index;
        $file->name = $name;
        $file->user = $req->email;
        $file->save();

        return redirect('/');
    }

    public function getName($name) {
        if($file = File::where('index', $name)->first()) {
            return $file->name;
        }
        return ['msg' => 'Filename not found.'];
    }

    public function download(Request $req) {
        // NAME => EQUIVALENTE A STORAGE
        $file = File::where('index', $req->name)->first();
        if($file) {
            return Storage::download('docs/' . $file->index, $file->name);
        }
    }

    public function getFiles() {
        $files = File::get();
        return $files;
    }
    
    public function getUserFiles(Request $req) {
        $files = File::where('user', $req->email)->get();
        return $files;
    }

}
