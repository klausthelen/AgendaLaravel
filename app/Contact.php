<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
   protected $fillable = ['c_name', 'c_lastname', 'c_cont_number','c_kindof','c_relationship', 'c_kindof'];

   protected $primaryKey = 'id';
}
