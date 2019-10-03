<?php

namespace App\Http\Controllers;


trait JsonUnify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function JsonParse($request)
    {
        $request = $request->getContent();
        $request = trim($request);
        $request = str_replace('\'', '"', $request);
        $request =json_decode($request,true);

        return $request;
    }
}
