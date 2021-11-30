<?php

namespace Petrik\Telefonok;

use Illuminate\Database\Eloquent\Model;

class Telefon extends Model{
    protected $table = 'telefonok';
    public $timestamps = false;
    
    protected $guarded = ['id'];
}