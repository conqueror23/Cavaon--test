<?php

namespace App\Http\Controllers;
use App\Http\Requests\DataRequest;
use App\models\project_tasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use JsonUnify;


    public function store(dataRequest $request)
    {
        $request=$this->JsonParse($request);

        foreach($request as $record){
//            print_r($record);
//            exit;

            project_tasks::updateOrCreate([
                'id'=>$record['id'],
                'project_id'=>$record['project_id'],
                'absolute_day'=>$record['absolute_day'],
                'name'=>$record['name'],
                'story_id'=>$record['story_id']===null?0:$record['story_id'],
            ]);
        }


        echo ('input finsihed');
        exit;


    }
}
