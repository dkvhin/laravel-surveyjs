<?php

namespace Dkvhin\LaravelSurveyJs\app\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Dkvhin\LaravelSurveyJs\app\Models\Survey;
use Dkvhin\LaravelSurveyJs\app\Http\Resources\SurveyResource;
use Dkvhin\LaravelSurveyJs\app\Http\Resources\SurveyResultResource;

class SurveyResultAPIController extends Controller
{
    public function index(Survey $survey)
    {
        $results = $survey->results()->paginate(config('survey-manager.pagination_perPage', 10));

        return SurveyResultResource::collection($results)
                ->additional(['meta' => [
                    'survey'    =>  new SurveyResource($survey),
                ]]);
    }

    /**
     * @param Survey $survey
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Survey $survey, Request $request)
    {
        $request->validate([
            'json'              => 'required',
            'live_session_id'   => 'required'
        ]);

        $result = $survey->results()->create([
            'json'              =>  $request->input('json'),
            'live_session_id'   =>  $request->input('live_session_id'),
            'ip_address'        =>  $request->ip(),
        ]);

        return response()->json([
            'data'      =>  new SurveyResultResource($result),
            'message'   =>  'Survey Result successfully created',
        ], 201);
    }
}
