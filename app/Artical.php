<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Artical extends Model
{
    protected $table='Artical';
    protected $primaryKey='article_id';
    public $timestamps=false;
    protected $guarded=[];
}
