<?php

namespace App\Http\Controllers;

use App\models\Grammar\Grammar;
use App\models\Listen\Listening;
use App\models\Read\Reading;
use App\models\Vocabulary\Vocabulary;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('pages.admin.dashbroad.index');
    }
    public function index(){
        return view('pages.frontend.index');
    }
    public function testPage(){
        return view('pages.frontend.testpage');
    }
    public function vocabularyTest(){
        $randomVocabulary = Vocabulary::all()->random(1)->first();
        $vocabulary = $randomVocabulary->with(['QuestitonVocabulary' => function($question){
            $question->with('answers');
            $question->with('right_answers');
        }])->inRandomOrder()->first();
//        dd($vocabulary);
        return view('pages.frontend.vocabulary', compact('vocabulary'));
    }
    public function grammarTest(){
        $randomGrammar= Grammar::all()->random(1)->first();
        $grammar = $randomGrammar->with(['QuestitonGrammar' => function($question){
            $question->with('answers')->with('right_answers')->get();
        }])->inRandomOrder()->first();
        return view('pages.frontend.grammar', compact('grammar'));
    }
    public function readingTest(){
        $randomReading= Reading::all()->random(1)->first();
        $reading = $randomReading->with(['QuestionReading' => function($question){
            $question->with('AnswerReading')->with('RightAnswerReading')->get();
        }])->inRandomOrder()->first();
        return view('pages.frontend.read', compact('reading'));
    }
    public function listeningTest(){
        $listening = Listening::all()->random(1)->first();;
        $listening = $listening::with(['TopicAudioListen' => function($audio){
            $audio->with(['questionListening' => function($question){
                $question->with('answerListening')->with('rightAnswers');
            }]);
        }])->inRandomOrder()->first();
        return view('pages.frontend.listening', compact('listening'));
    }


    public function signIn(){
        return view('pages.sign-in');
    }
    public function signUp(){
        return view('pages.sign-up');
    }
    public function signUpEmail(){
        return view('pages.sign-up-email');
    }
    public function recoverPassword(){
        return view('pages.recover-password');
    }


}
