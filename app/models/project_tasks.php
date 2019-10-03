<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class project_tasks extends Model
{
    protected $table = 'project_tasks';
//    protected $guarded= ['id','project_id','story_id']; // guarded issues??
    protected $guarded=['id'];
    protected $primaryKey ='id';



    private $id;
    private $project_id;
    private $absolute_day;
    private $name;
    private $story_id ='null';

}
