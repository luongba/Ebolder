<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\QuestionVocabulary;
class VocabularyController extends Controller
{
    public function index(){
        return view('pages.admin.reading.index');
    }

    public function create(Request $request){
        $data = $request->all();


        foreach ($data as $key => $value) {
            QuestionVocabulary::create([
                "id"=>$value['id'],
                "question"=> $value['question']
            ]);
        }

    }
}
