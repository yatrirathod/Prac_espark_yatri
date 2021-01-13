<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emp_refren extends Model
{
    protected $table = 'emp_refre_contacts';
   

   	protected $fillable = [
			   	'name', 
			   	'contact', 
			   	'relation',
			   	'empID',
			   ];
	public function Employee(){
		return $this->belongsTo('App\Models\Employee', 'empID', 'id');
	}
}
