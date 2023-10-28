<?php

namespace App\Http\Controllers;

use App\models\Grammar\Grammar;
use App\models\Learn\ExamResult;
use App\models\Learn\Learn;
use App\models\Listen\Listening;
use App\models\Pronunciation\Pronunciation;
use App\models\Speak\QuestionLuyenAm;
use App\models\Read\Reading;
use App\models\User\HistoryExam;
use App\models\HistoryLearn;
use App\models\Speak\Speak;
use App\models\Vocabulary\Vocabulary;
use App\models\Exam\ExamHistoryFinal;
use App\models\Listen\LevelListen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public $data;
    public function home()
    {
        return redirect()->route('admin.exam-list');
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
            $testId = $request->testId;
            $levelId =$request->levelId;
            $vocabulary = Vocabulary::whereId($request->testId)->with(['QuestionVocabulary' => function ($question) {
                $question->with('answers');
                $question->with('right_answers');
            }])->first();
            return view('pages.frontend.vocabulary', compact(['vocabulary', 'testId', 'levelId']));
        } else {
            $randomVocabulary = Vocabulary::all()->random(1)->first();
            $vocabulary = $randomVocabulary->with(['QuestionVocabulary' => function ($question) {
                $question->with('answers');
                $question->with('right_answers');
            }])->inRandomOrder()->first();
            return view('pages.frontend.vocabulary', compact('vocabulary'));
        }
    }

    public function grammarTest(Request $request)
    {
        if (isset($request->testId)) {
            $testId = $request->testId;
            $levelId =$request->levelId;
            $grammar = Grammar::whereId($request->testId)->with(['QuestionGrammar' => function ($question) {
                $question->with('answers')->with('right_answers')->get();
            }])->first();
            return view('pages.frontend.grammar', compact(['grammar', 'testId', 'levelId']));
        } else {

            $randomGrammar = Grammar::all()->random(1)->first();
            $grammar = $randomGrammar->with(['QuestionGrammar' => function ($question) {
                $question->with('answers')->with('right_answers')->get();
            }])->inRandomOrder()->first();
            return view('pages.frontend.grammar', compact('grammar'));
        }
    }

    public function readingTest(Request $request)
    {
        if (isset($request->testId)) {
            $testId = $request->testId;
            $levelId =$request->levelId;
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

    public function pronunciationTest(Request $request)
    {
        if (isset($request->testId)) {
            $testId = $request->testId;
            $levelId =$request->levelId;
            $pronunciation = Pronunciation::whereId($request->testId)->with(['QuestionPronunciation' => function ($question) {
                $question->with('AnswerPronunciation')->with('RightAnswerPronunciation')->get();
            }])->first();
            return view('pages.frontend.pronunciation', compact(['pronunciation', 'testId', 'levelId']));
        } else {
            $randomPronunciation = Pronunciation::all()->random(1)->first();
            $pronunciation = $randomPronunciation->with(['QuestionPronunciation' => function ($question) {
                $question->with('AnswerPronunciation')->with('RightAnswerPronunciation')->get();
            }])->inRandomOrder()->first();
            return view('pages.frontend.pronunciation', compact('pronunciation'));
        }

    }

    public function listeningTest(Request $request)
    {
        if (isset($request->testId)) {
            $testId = $request->testId;
            $levelId =$request->levelId;
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
    public function speakingTest(Request $request){
        if (isset($request->testId)) {
            $testId = $request->testId;
            $levelId =$request->levelId;
            $speaking = Speak::whereId($request->testId)->with(['QuestionSpeak' => function ($question) {
                $question->with('answers')->with('right_answers')->get();
            }])->first();
            return view('pages.frontend.speakingBasic', compact(['speaking', 'testId', 'levelId']));
        } else {

            $randomSpeaking = Speak::all()->random(1)->first();
            $speaking = $randomSpeaking->with(['QuestionSpeak' => function ($question) {
                $question->with('answers')->with('right_answers')->get();
            }])->inRandomOrder()->first();
            return view('pages.frontend.speakingBasic', compact('speaking'));
        }
    }

    public function speakingTestTypeSecond(Request $request)
    {
        if (isset($request->testId)) {
            $testId = $request->testId;
            $levelId =$request->levelId;
            $speaking = QuestionLuyenAm::whereId($testId)->first();
            return view('pages.frontend.speaking', compact(['speaking', 'testId', 'levelId']));
        }

    }
    

    public function saveHistory(Request $request)
    {
        try {
            if(isset($request->no_exam) && $request->no_exam == true){
                HistoryLearn::create([
                    'test_type' => $request->test_type,
                    'topic_name' => $request->topic_name,
                    'scores' => $request->scores,
                    'completion_time' => $request->completion_time,
                    'user_id' => $request->user()->id,
                    'level_id' => $request->level_id,
                ]);
            }else {
                HistoryExam::create([
                    'test_type' => $request->test_type,
                    'topic_name' => $request->topic_name,
                    'scores' => $request->scores,
                    'completion_time' => $request->completion_time,
                    'user_id' => $request->user()->id,
                    'content_exam'=> $request->content_exam,
                    'exam_id' => $request->exam_id,
                    'level_id' => $request->level_id,
                    'exam_final_id' => $request->exam_final_id
                ]);
            }
        } catch (\Exception $e) {
            print_r($e);
        }
    }

    public function learnPage(Request $request)
    {
        if (isset($request->levelId)) {
            $levelName = $request->levelName;
            $skill = $request->skill;
            $levelId =$request->levelId;
            return view('pages.frontend.learnpage', compact(['levelName', 'skill', 'levelId']));
        }
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

    public function lessonPage(Request $request)
    {

        if (isset($request->testId)) {
            $testId = $request->testId;
            $levelId =$request->levelId;
            $lesson = Learn::whereId($request->testId)->with(['QuestionLesson' => function ($question) {
                $question->with('AnswerLesson')->with('RightAnswerLesson')->get();
            }])->first();
            return view('pages.frontend.lessonpage', compact(['lesson', 'testId', 'levelId']));
        }
        
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
        $history = ExamHistoryFinal::where('user_id', $user->id)->with('Exam')->orderBy('created_at', 'desc')->take(20)->get();
        return view('pages.frontend.history', compact('history'));
    }
    public function historyLearnPage(){
        $user = Auth::user();
        $history = HistoryLearn::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(20)->get();
        return view('pages.frontend.historyLearn', compact('history'));
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
            if($request->status == 'learn'){
                $history = HistoryExam::where('test_type', $request->type)->where('exam_id', $request->exam_id)->where('user_id', Auth::user()->id)->where('level_id', $request->level_id)->orderBy('id', 'desc')->first();
            }else {
                $history = HistoryExam::where('test_type', $request->type)->where('exam_id', $request->exam_id)->where('user_id', Auth::user()->id)->where('exam_final_id', $request->exam_final_id)->orderBy('id', 'desc')->first();
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

    public function updateStatusExam(Request $request){
        $data = app("App\\models\\{$request->model}\\{$request->class}");
        $data->whereId($request->id)->update([
            'is_exam' => $request->is_exam
        ]);
        if (!$request->is_exam) {
            if ($request->class == 'Listening') {
                LevelListen::where('listening_id', $request->id)->delete();
            }
        }
        return response()->json([
            "status" => 200,
            "errorCode" => 0,
        ]);
    }

    public function chooseAction(){
        return view('pages.frontend.chooseAction');
    }

    public function features() {
        return view('pages.frontend.features');
    }


}
