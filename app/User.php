<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//pdated_at
//name
//email
//password
//remember_token
//created_at


class User extends Model
{
    protected $table='users';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];
}
