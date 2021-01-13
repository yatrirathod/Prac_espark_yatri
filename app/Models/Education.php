<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
   protected $table = 'emp_education';
   

   protected $fillable = [
			   	'className', 
			   	'boardName', 
			   	'year',
			   	'percenatge',
			   	'empID',
			   ];
}
