<?php

namespace App\Http\Controllers;

use App\models\Grammar\Grammar;
use App\models\Learn\ExamResult;
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
            $query = explode('=', $request->query('testId'));
            $testId = $query[0][0];
            $levelId = $query[1];
            $vocabulary = Vocabulary::whereId($request->testId)->with(['QuestitonVocabulary' => function ($question) {
                $question->with('answers');
                $question->with('right_answers');
            }])->first();
            return view('pages.frontend.vocabulary', compact(['vocabulary', 'testId', 'levelId']));
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
            $query = explode('=', $request->query('testId'));

            $testId = $query[0][0];
            $levelId = $query[1];
            $grammar = Grammar::whereId($request->testId)->with(['QuestitonGrammar' => function ($question) {
                $question->with('answers')->with('right_answers')->get();
            }])->first();
            return view('pages.frontend.grammar', compact(['grammar', 'testId', 'levelId']));
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
            $query = explode('=', $request->query('testId'));

            $testId = $query[0][0];
            $levelId = $query[1];
            $reading = Reading::whereId($request->testId)->with(['QuestionReading' => function ($question) {
                $question->with('AnswerReading')->with('RightAnswerReading')->get();
            }])->first();
            return view('pages.frontend.read', compact(['reading', 'testId', 'levelId']));
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
            $query = explode('=', $request->query('testId'));

            $testId = $query[0][0];
            $levelId = $query[1];
            $listening = Listening::whereId($request->testId)->with(['TopicAudioListen' => function ($audio) {
                $audio->with(['questionListening' => function ($question) {
                    $question->with('answerListening')->with('rightAnswers');
                }]);
            }])->first();
            return view('pages.frontend.listening', compact(['listening', 'testId', 'levelId']));
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
                'content_exam'=> $request->content_exam,
                'exam_id' => $request->exam_id,
                'level_id' => $request->level_id
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

    public function lessonPage($id)
    {

        $lesson = Learn::whereId($id)->with(['QuestionLesson' => function ($question) {
            $question->with('AnswerLesson')->with('RightAnswerLesson')->get();
        }])->first();
        return view('pages.frontend.lessonpage', compact('lesson'));
    }

    public function saveExamResult(Request $request)
    {
        $type = $request->type;
        $levelId = $request->levelId;
        $userId = Auth::user()->id;
        switch ($type) {
            case 1:
                $isCheck = ExamResult::where('user_id', $userId)->where('level_id', $levelId)->exists();
                if ($isCheck) {
                    ExamResult::where('user_id', $userId)->where('level_id', $levelId)->update([
                        'is_done_listen' => 1,
                    ]);
                } else {
                    ExamResult::create([
                        'level_id' => $levelId,
                        'user_id' => $userId,
                        'is_done_listen' => 1
                    ]);
                }
                break;


            case 2:
                $isCheck = ExamResult::where('user_id', $userId)->where('level_id', $levelId)->exists();
                if ($isCheck) {
                    ExamResult::where('user_id', $userId)->where('level_id', $levelId)->update([
                        'is_done_read' => 1,
                    ]);
                } else {
                    ExamResult::create([
                        'level_id' => $levelId,
                        'user_id' => $userId,
                        'is_done_read' => 1
                    ]);
                }
                break;
            case 3:
                $isCheck = ExamResult::where('user_id', $userId)->where('level_id', $levelId)->exists();
                if ($isCheck) {
                    ExamResult::where('user_id', $userId)->where('level_id', $levelId)->update([
                        'is_done_vocabulary' => 1,
                    ]);
                } else {
                    ExamResult::create([
                        'level_id' => $levelId,
                        'user_id' => $userId,
                        'is_done_vocabulary' => 1
                    ]);
                }
                break;
            case 4:
                $isCheck = ExamResult::where('user_id', $userId)->where('level_id', $levelId)->exists();
                if ($isCheck) {
                    ExamResult::where('user_id', $userId)->where('level_id', $levelId)->update([
                        'is_done_grammar' => 1,
                    ]);
                } else {
                    ExamResult::create([
                        'level_id' => $levelId,
                        'user_id' => $userId,
                        'is_done_grammar' => 1
                    ]);
                }
                break;

        }

    }

    public function historyPage(){
        $user = Auth::user();
        $history = HistoryExam::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(20)->get();
        return view('pages.frontend.history', compact('history'));
    }
    public function fullhistory(){
        $user = Auth::user();
        $history = HistoryExam::where('user_id', $user->id)->get();
        return response()->json([
            "status" => 200,
            "errorCode" => 0,
            "data" => $history
        ]);
    }

    public function checkHistoryExam(Request $request){
        
        try {
            $history = HistoryExam::where('test_type', $request->type)->where('exam_id', $request->exam_id)->where('user_id', Auth::user()->id)->where('level_id', $request->level_id)->orderBy('id', 'desc')->first();
            if(isset($history)){
                $score = explode("/",$history->scores);
                $totalScore = (float)$score[0] / (float)$score[1] * 100;
                if($totalScore < 20){
                    $history = null;
                }
                
            }
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $history
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => 400,
                "errorCode" => 0,
                "message" => "Không tồn tại"
            ]);
        }
        
        
    }


}
