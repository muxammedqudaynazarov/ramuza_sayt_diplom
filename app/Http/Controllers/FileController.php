<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show($status)
    {
        if (in_array($status, ['s', 'a', 'd'])) {
            $files = File::where('status', $status)->where('user_id', auth()->id())->paginate(10);
            return view('pages.student.files.index', compact(['files', 'status']));
        }
    }

    public function create()
    {
        return view('pages.student.files.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'formFile' => 'required|file'
        ]);
        $fileNameWithExtension = $request->file('formFile')->getClientOriginalName();
        $newFileName = uniqid('file_') . '.' . strtolower(pathinfo($fileNameWithExtension, PATHINFO_EXTENSION));
        $request->file('formFile')->storeAs('public/uploads', $newFileName);

        File::create([
            'topic' => $request->topic,
            'url' => '/uploads/' . $newFileName,
            'user_id' => auth()->id(),
            'information' => json_encode([
                'teacher' => $request->teacher,
                'date' => $request->date,
            ])
        ]);

        return redirect('/dashboard');
    }
}
