<?php

namespace App\Http\Controllers;
use App\Http\Controllers\JsonUnify;

use App\Http\Requests\DataRequest;
use App\models\projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use JsonUnify;


    public function store(DataRequest $request)
    {
        $request=$this->JsonParse($request);
        foreach($request as $record){
            projects::updateOrCreate(['id'=>$record['id'],'name'=>$record['name']]);
        }


    }
}
