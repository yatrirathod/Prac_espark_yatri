<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emp_experince extends Model
{
    protected $table = 'emp_experiences';
   

   protected $fillable = [
			   	'companyName', 
			   	'designation', 
			   	'from',
			   	'to',
			   	'empID',
			   ];
	public function Employee(){
		return $this->belongsTo('App\Models\Employee', 'empID', 'id');
	}
}
