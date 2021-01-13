<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emp_pref extends Model
{
    protected $table = 'emp_prefes';
   

   	protected $fillable = [
			   	'location', 
			   	'department', 
			   	'noticePeriod',
			   	'CTC',
			   	'ECTC',
			   	'empID',
			   ];

	public function Employee(){
		return $this->belongsTo('App\Models\Employee', 'empID', 'id');
	}
}
