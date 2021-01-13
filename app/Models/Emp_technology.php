<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Emp_technology extends Model
{
    protected $table = 'emp_technologies';
   

   	protected $fillable = [
			   	'techID ',  
			   	'level',
			   	'empID',
			   ];
	public function Employee(){
		return $this->belongsTo('App\Models\Employee', 'empID', 'id');
	}
	public function Technologies(){
		return $this->belongsTo('App\Models\Techonolgy', 'techID', 'id');
	}
}
