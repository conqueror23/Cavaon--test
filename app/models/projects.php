<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    protected $guarded= ['id','name'];

    protected $table='projects';

    protected $primaryKey ='id';
    private $name;
    private $id;


}
