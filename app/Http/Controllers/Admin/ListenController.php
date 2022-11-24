<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AudioListening;

class ListenController extends Controller
{
    public function listQuestion()
    {
        return view('pages.admin.listening.question.index');
    }

    public function createQuestion()
    {
        return view('pages.admin.listening.question.create');
    }

    public function createAudioAndQuestion(Request $request)
    {
        if ($request->has('file')) {
            $file = $request->file;
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/audio'), $file_name);

        }
        AudioListening::create([
            'name' => $file->getClientOriginalName(),
            'audio' => $file_name
        ]);
    }
}
