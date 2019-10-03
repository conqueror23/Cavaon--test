<?php

namespace App\Http\Controllers;

use App\Http\Requests\dataRequest;
use App\models\project_tasks;
use App\models\projects;
use App\models\stories;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use phpDocumentor\Reflection\Project;
use PhpParser\Node\Expr\Cast\Object_;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function  ShowData(){
        $projects = projects::all();
        $tasks =project_tasks::all();
        $stories =stories::all();
        $data['projects'] =$projects;
        $data['tasks']=$tasks;
        $data['stories'] =$stories;
        var_dump($data['projects']);
        exit;

        return view('layout.app')->with('data',$data);
    }

}
