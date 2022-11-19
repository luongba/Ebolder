<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\QuestionVocabulary;
use App\models\AnswerVocabulary;
use Psy\Util\Json;

class VocabularyController extends Controller
{
    public function index(){
        return view('pages.admin.vocabulary.index');
    }

    public function getAllInfoQuestion(){
        try {
            $query = new QuestionVocabulary();
            $data = $query->with('answers')->with('right_answers')->get();
            return response()->json([
                "status"=> 200,
                "errorCode"=>0,
                "data"=>$data,

            ]);
        }catch (\Exception $e){
            return response()->json([
                "status"=> $e->getCode(),
                "errorCode"=>$e->getCode(),
                "data"=> null,
                "message"=>$e->getMessage()
            ]);
        }

    }
    public function create(){
        return view('pages.admin.vocabulary.create');
    }

    public function store(Request $request){
        $data = $request->all();
        foreach ($data as $key => $value) {
            $res = QuestionVocabulary::create([
                "id"=>$value['id'],
                "question"=> $value['question']
            ]);
            $res->right_answers()->create([
                "answer_id" => $value["answer"]
            ]);

            foreach($data[$key]['dataAns'] as $keyAds => $item){
                QuestionVocabulary::find($value['id'])->answers()->create([
                    "id" => $item['idAns'],
                    "text" => $item['text']
                ]);
            }
        }

    }

    public function update(Request $request){
        $res =  QuestionVocabulary::where('id',$request->id)->first();
        $res->update(
            [
                "question"=> $request->question
            ]
        );
        foreach( $request->dataAns as $keyAds => $item){
                $res->answers()->find($item['id'])->update([
                    "text" => $item['text']
                ]);
            }
        $res->right_answers()->find($request->right_answers["id"])->update([
            "answer_id" => $request->right_answers["answer_id"]
        ]);

    }
}
