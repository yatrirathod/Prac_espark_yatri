<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   protected $table = 'employees';
   

   protected $fillable = [
			   	'firstName', 
			   	'lastName', 
			   	'email',
			   	'designation',
			   	'phoneNo',
			   	'gender',
			   	'relationStatus',
			   	'dob',
			   	'address',
			   	'state',
			   	'city',
			   	'zipCode',
			   ];
}
