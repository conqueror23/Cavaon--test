<?php

namespace App\Http\Controllers;
use App\Http\Requests\DataRequest;
use App\models\stories;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    use JsonUnify;

    public function store(DataRequest $request)
    {
        $request=$this->JsonParse($request);

        foreach($request as $record){
            stories::updateOrCreate([
                'id'=>$record['id'],
                'name'=>$record['name'],
                'take_days'=>$record['take_days'],
                'daily_tasks_lisk'=>json_encode( $record['daily_tasks_lisk'],true)
            ]);
        }
        echo 'input finshed';
        exit;

    }
}
