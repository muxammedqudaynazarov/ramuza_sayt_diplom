<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index()
    {
        $files = File::paginate(10);
        return view('pages.student.archive.index', compact('files'));
    }

    public function antiplag()
    {
        return view('pages.student.antiplag');
    }
}
