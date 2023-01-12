<?php

namespace App\Http\Controllers;

use App\models\Grammar\Grammar;
use App\models\Learn\Learn;
use App\models\Listen\Listening;
use App\models\Read\Reading;
use App\models\User\HistoryExam;
use App\models\Vocabulary\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        return view('pages.admin.dashbroad.index');
    }

    public function index()
    {
        return view('pages.frontend.index');
    }

    public function testPage()
    {
        return view('pages.frontend.testpage');
    }

    public function vocabularyTest(Request $request)
    {

        if (isset($request->testId)) {
            $vocabulary = Vocabulary::whereId($request->testId)->with(['QuestitonVocabulary' => function ($question) {
                $question->with('answers');
                $question->with('right_answers');
            }])->first();
            return view('pages.frontend.vocabulary', compact('vocabulary'));
        } else {
            $randomVocabulary = Vocabulary::all()->random(1)->first();
            $vocabulary = $randomVocabulary->with(['QuestitonVocabulary' => function ($question) {
                $question->with('answers');
                $question->with('right_answers');
            }])->inRandomOrder()->first();
            return view('pages.frontend.vocabulary', compact('vocabulary'));
        }
    }

    public function grammarTest(Request $request)
    {
        if (isset($request->testId)) {
            $grammar = Grammar::whereId($request->testId)->with(['QuestitonGrammar' => function ($question) {
                $question->with('answers')->with('right_answers')->get();
            }])->first();
            return view('pages.frontend.grammar', compact('grammar'));
        } else {

            $randomGrammar = Grammar::all()->random(1)->first();
            $grammar = $randomGrammar->with(['QuestitonGrammar' => function ($question) {
                $question->with('answers')->with('right_answers')->get();
            }])->inRandomOrder()->first();
            return view('pages.frontend.grammar', compact('grammar'));
        }
    }

    public function readingTest(Request $request)
    {
        if (isset($request->testId)) {
            $reading = Reading::whereId($request->testId)->with(['QuestionReading' => function ($question) {
                $question->with('AnswerReading')->with('RightAnswerReading')->get();
            }])->first();
            return view('pages.frontend.read', compact('reading'));
        } else {
            $randomReading = Reading::all()->random(1)->first();
            $reading = $randomReading->with(['QuestionReading' => function ($question) {
                $question->with('AnswerReading')->with('RightAnswerReading')->get();
            }])->inRandomOrder()->first();
            return view('pages.frontend.read', compact('reading'));
        }

    }

    public function listeningTest(Request $request)
    {
        if (isset($request->testId)) {
            $listening = Listening::whereId($request->testId)->with(['TopicAudioListen' => function ($audio) {
                $audio->with(['questionListening' => function ($question) {
                    $question->with('answerListening')->with('rightAnswers');
                }]);
            }])->first();
            return view('pages.frontend.listening', compact('listening'));
        } else {
            $listening = Listening::all()->random(1)->first();;
            $listening = $listening::with(['TopicAudioListen' => function ($audio) {
                $audio->with(['questionListening' => function ($question) {
                    $question->with('answerListening')->with('rightAnswers');
                }]);
            }])->inRandomOrder()->first();
            return view('pages.frontend.listening', compact('listening'));
        }

    }

    public function saveHistory(Request $request)
    {
        try {
            HistoryExam::create([
                'test_type' => $request->test_type,
                'topic_name' => $request->topic_name,
                'scores' => $request->scores,
                'completion_time' => $request->completion_time,
                'user_id' => $request->user()->id,
            ]);
        } catch (\Exception $e) {
            print_r($e);
        }
    }

    public function learnPage()
    {
        return view('pages.frontend.learnpage');
    }


    public function signIn()
    {
        return view('pages.sign-in');
    }

    public function signUp()
    {
        return view('pages.sign-up');
    }

    public function signUpEmail()
    {
        return view('pages.sign-up-email');
    }

    public function recoverPassword()
    {
        return view('pages.recover-password');
    }

    public function lessonPage($id){
        
        $lesson = Learn::whereId($id)->with(['QuestionLesson' => function ($question) {
            $question->with('AnswerLesson')->with('RightAnswerLesson')->get();
        }])->first();
        return view('pages.frontend.lessonpage', compact('lesson'));
    }


}
