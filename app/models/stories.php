<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class stories extends Model
{
    //
    protected $table = 'stories';
    protected $guarded= ['id'];
    protected $primaryKey ='id';
    private $id;
    private $name;
    private $take_days;
    private $daily_tasks_lisk;

}
