<?php

namespace App\Http\Controllers;

use App\Http\Requests\dataRequest;
use App\models\projects;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use phpDocumentor\Reflection\Project;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(dataRequest $request){

        $data = $request->getContent();
        $data = trim($data);
//        $data =preg_replace('/\a-zA-z0-9\+/','',$data);
        $data = str_replace('\'', '"', $data);
        $data =json_decode($data,true);


        var_dump($data);
    }
}
