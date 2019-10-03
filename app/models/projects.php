<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    protected $guarded= ['id'];

    protected $table='projects';

    protected $primaryKey ='id';
    private $name;
    private $id;


}
