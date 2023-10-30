<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Learn\ExamResult;
use App\models\LevelTesting\Level;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LevelController extends Controller
{
    public function index()
    {
        return view('pages.admin.level.index');
    }

    public function createLevel(Request $request)
    {
        try {
            DB::beginTransaction();
            $level = Level::create([
                "name" => $request->name,
            ]);
            $level->Learn()->attach($request->lessons);
            $level->Reading()->attach($request->reading_id);
            $level->Vocabulary()->attach($request->vocabulary_id);
            $level->Listen()->attach($request->listening_id);
            $level->Grammar()->attach($request->grammar_id);
            $level->Speak()->attach($request->speakings);
            $level->Pronunciation()->attach($request->talkings);
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Thêm level Thành công!"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Thêm level Thất bại!"
            ]);
        }

    }


    public function all(Request $request) {
        try {
            if ($request->search) {
                $search = strtolower($request->search);
                $levels = Level::whereRaw('LOWER(name) LIKE ?', ['%' . $search . '%'])
                    ->orderBy('name', 'asc')->get();
            } else {
                $levels = Level::query()
                    ->orderBy('name', 'asc')
                    ->get();
            }
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $levels,
                "message" => "Successful"
            ]);
        } catch(Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => $e->getMessage()
            ]);
        }
    }

    public function getAllLevel(Request $request)
    {
        try {
            DB::beginTransaction();
            $userID = Auth::user()->id;
            $level = Level::query()
             ->with(array('Vocabulary' => function($query) {
                $query->orderByRaw("CAST(REGEXP_REPLACE(name, '[^0-9]', '') AS UNSIGNED), name");
            }))
            ->with(array('Grammar' => function($query) {
                $query->orderByRaw("CAST(REGEXP_REPLACE(name, '[^0-9]', '') AS UNSIGNED), name");
            }))
            ->with(array('Listen' => function($query) {
                $query->orderByRaw("CAST(REGEXP_REPLACE(name, '[^0-9]', '') AS UNSIGNED), name");
            }))
            ->with(array('Learn' => function($query) {
                $query->orderByRaw("CAST(REGEXP_REPLACE(name, '[^0-9]', '') AS UNSIGNED), name");
            }))
            ->with(array('Speak' => function($query) {
                $query->orderByRaw("CAST(REGEXP_REPLACE(name, '[^0-9]', '') AS UNSIGNED), name");
            }))
            ->with(array('Pronunciation' => function($query) {
                $query->orderByRaw("CAST(REGEXP_REPLACE(name, '[^0-9]', '') AS UNSIGNED), name");
            }))
            ->get();
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $level,
                "message" => "Lấy danh sách level Thành công!"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => $e->getMessage()
            ]);
        }

    }

    public function deleteLevel(Request $request)
    {
        try {
            DB::beginTransaction();
            $level = Level::find($request->id)->delete();
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $level,
                "message" => "Xóa level Thành công!"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa level Thất bại!"
            ]);
        }

    }

    public function detailLevel(Request $request)
    {
        ini_set('memory_limit', '-1');
        try {
            $level = new Level();
            $level = $level->where('id', $request->id)
                ->with([
                    'Learn' => function($query) {
                        $query->select('learns.id', 'learns.name', 'learns.is_exam')
                            ->withCount('QuestionLesson');
                    },
                ])
                ->with([
                    'Reading' => function($query) {
                        $query->select('readings.id', 'readings.name', 'readings.is_exam')
                            ->withCount('QuestionReading');
                    },
                ])
                ->with([
                    'Vocabulary' => function($query) {
                        $query->select('vocabularies.id', 'vocabularies.name', 'vocabularies.is_exam')
                            ->withCount('QuestionVocabularyRelationship');
                    },
                ])
                ->with([
                    'Grammar' => function($query) {
                        $query->select('grammars.id', 'grammars.name', 'grammars.is_exam')
                            ->withCount('QuestionGrammarRelationship');
                    },
                ])
                ->with([
                    'Speak' => function($query) {
                        $query->select('speaks.id', 'speaks.name', 'speaks.is_exam')
                            ->withCount('QuestionSpeakRelationship');
                    },
                ])
                ->with([
                    'Pronunciation' => function($query) {
                        $query->select('pronunciations.id', 'pronunciations.name', 'pronunciations.is_exam')
                            ->withCount('QuestionPronunciation');
                    },
                ])
                ->with([
                    'Listen' => function($query) {
                        $query->select('listenings.id', 'listenings.name', 'listenings.is_exam')
                            ->with([
                                'TopicAudioListen' => function ($query) {
                                    $query->select('id')->withCount('questionListening');
                                }
                        ]);
                    },
                ])
                ->first();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $level,
                "message" => "Lấy level Thành công!"
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa level Thất bại!"
            ]);
        }
    }

    public function updateLevel(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $level = Level::where('id', $request->id)->first();
            $level->update([
                "name" => $request->name,
            ]);
            $level->Learn()->sync($request->lessons);
            $level->Reading()->sync($request->reading_id);
            $level->Vocabulary()->sync($request->vocabulary_id);
            $level->Listen()->sync($request->listening_id);
            $level->Grammar()->sync($request->grammar_id);
            $level->Speak()->sync($request->speakings);
            DB::commit();
            $level->Pronunciation()->sync($request->talkings);
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "update level Thành công!"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "update level Thất bại!"
            ]);
        }


    }

    public function checkLevelPassed()
    {
        $userID = Auth::user()->id;
        $count = DB::table('levels')->count();
        $rows = DB::table('levels')->join('exam_result', 'levels.id', '=', 'exam_result.level_id')->where('user_id', $userID)->get();
        $sum = 1;
        foreach ($rows as $row) {
            if (($row->reading_id == null || $row->is_done_read == 1)
            &&
            ($row->vocabulary_id == null || $row->is_done_vocabulary == 1)
            &&
           ( $row->listening_id == null || $row->is_done_listen == 1)
            &&
            ($row->grammar_id == null || $row->is_done_grammar == 1)) {
                $sum++;
            }
        }

        if($sum > $count){
            $sum = $count;
        }
        return response()->json([
            "data" => $sum,
            'status'=> 200
        ], 200);
    }
}
