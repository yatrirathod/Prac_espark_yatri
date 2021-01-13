<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emp_language extends Model
{
    protected $table = 'emp_langauges';
   

    protected $fillable = [
			   	'langID', 
			   	'empID', 
			   	'level',
			   ];
	public function Employee(){
		return $this->belongsTo('App\Models\Employee', 'empID', 'id');
	}
	public function Language(){
		return $this->belongsTo('App\Models\Languages', 'langID', 'id');
	}
}
