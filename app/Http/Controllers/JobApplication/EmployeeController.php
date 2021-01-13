<?php

namespace App\Http\Controllers\JobApplication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Models\Employee;
use App\Models\Languages;
use App\Models\Techonolgy;
use App\Models\Education;
use App\Models\Emp_experince;
use App\Models\Emp_language;
use App\Models\Emp_pref;
use App\Models\Emp_refren;
use App\Models\Emp_technology;

class employeeController extends Controller
{
    public function index(){
    	$techonolgy = Techonolgy::where('status','=','active')->get();
    	$language  = Languages::get();
    	return view('ApplyJob.JobApplicationForm',['techonolgy' => $techonolgy,'language' => $language]);
    }

    public function store(Request $request)
    {
    	$data = array();

    	// print_r($_POST);exit;
  /*  	$validated = $request->validate([
			'fname'  => 'required|min:5|max:15',
			'lname'  => 'required|min:5|max:15',
			'email'  => 'required',
			'designation' => 'required',
			'phone'  => 'required',
			'gender' => 'required',
			'relation' => 'required',
			'dob' 	=> 'required',
			'add' => 'required|min:20|max:99',
			'state' => 'required',
			'city'  => 'required',
          	'zip' => 'required',
		]);*/
		

    	//insert in emp table
		$employeedata_insert = new Employee;
		$employeedata_insert->firstName = $request->get('fname');
		$employeedata_insert->lastName = $request->get('lname');
		$employeedata_insert->email = $request->get('email');
		$employeedata_insert->designation = $request->get('designation');
		$employeedata_insert->phoneNo = $request->get('phone');
		$employeedata_insert->gender = $request->get('gender');
		$employeedata_insert->relationStatus = $request->get('relation');
		$employeedata_insert->dob = $request->get('dob');
		$employeedata_insert->address =$request->get('add');
		$employeedata_insert->state = $request->get('state');
		$employeedata_insert->city = $request->get('city');
		$employeedata_insert->zipCode = $request->get('zip');
		$employeedata_insert->save();

		$emp_ID = $employeedata_insert->id;
		//emp Education insert
		$Education_cnt = $request->get('cntEduc');
		for ($i=0; $i<$Education_cnt; $i++) { 
			if($request->get('class')[$i] && !empty($request->get('class')[$i]) 
				&& $request->get('nameBoard')[$i] && !empty($request->get('nameBoard')[$i])
				&& $request->get('pasyear')[$i] && !empty($request->get('pasyear')[$i])
				&& $request->get('perc')[$i] && !empty($request->get('perc')[$i]) 
			)
			{
				
				$className = $request->get('class')[$i];
				$boardName = $request->get('nameBoard')[$i];
				$pasingYear = $request->get('pasyear')[$i];
				$percenatge = $request->get('perc')[$i];

				$empEducation_insert = new Education;
				$empEducation_insert->className = $className;
				$empEducation_insert->boardName = $boardName;
				$empEducation_insert->year = $pasingYear;
				$empEducation_insert->percenatge = $percenatge;
				$empEducation_insert->empID = $emp_ID;
				$empEducation_insert->save();
			}
		}
		//emp Experience insert
		$Exper_cnt = $request->get('cntExp');
		for($i=1; $i <= $Exper_cnt; $i++) { 
			if($request->get('companyName_'.$i) && !empty($request->get('companyName_'.$i)) && $request->get('desi_'.$i) && !empty($request->get('desi_'.$i))
				&& $request->get('from_'.$i) && !empty($request->get('from_'.$i))
				&& $request->get('to_'.$i) && !empty($request->get('to_'.$i)) 
			)
			{
				// echo($_POST['companyName_'.$i] . '<br>');
				$companyName = $request->get('companyName_'.$i);
				$desig = $request->get('desi_'.$i);
				$from = $request->get('from_'.$i);
				$to = $request->get('to_'.$i);

				$empExp_insert = new Emp_experince;
				$empExp_insert->companyName = $companyName;
				$empExp_insert->designation = $desig;
				$empExp_insert->from = $from;
				$empExp_insert->to = $to;
				$empExp_insert->empID = $emp_ID;
				$empExp_insert->save();
			}
		}
		//emp language insert
		$lang_cnt = $request->get('cnt_lang');
		for ($i=0; $i<$lang_cnt; $i++) { 
			if($request->get('Lang')[$i] && !empty($request->get('Lang')[$i]) 
			)
			{
				$langID = $request->get('Lang')[$i];	
				$langLevel = $request->get('level_'.$langID);
				if($request->get('level_'.$langID)){
	        		$level   = implode(',',$request->get('level_'.$langID));
	        	}
				$empLang_insert = new Emp_language;
				$empLang_insert->langID  = $langID;
				$empLang_insert->level = $level;
				$empLang_insert->empID = $emp_ID;
				$empLang_insert->save();
			}
		}
		//emp technology insert
		$tech_cnt = $request->get('cnt_tech');
		for ($i=0; $i<$tech_cnt ; $i++) { 
			if($request->get('tech')[$i] && !empty($request->get('tech')[$i]) 
			)
			{
				$techID = $request->get('tech')[$i];
				$level = $request->get('techlevel_'.$techID);

				$empTech_insert = new Emp_technology;
				$empTech_insert->techID = $techID;
				$empTech_insert->level = $level;
				$empTech_insert->empID = $emp_ID;
				$empTech_insert->save();
			}
		}
		//emp Refernce insert
		$Ref_cnt = $request->get('cntRef');
		for ($i=1; $i <= $Ref_cnt ; $i++) { 
			if($request->get('refName_'.$i) && !empty($request->get('refName_'.$i)) 
				&& $request->get('refContact_'.$i) && !empty($request->get('refContact_'.$i))
				&& $request->get('refrelation_'.$i) && !empty($request->get('refrelation_'.$i)) 
			)
			{
				$refName = $request->get('refName_'.$i);
				$contact = $request->get('refContact_'.$i);
				$relation = $request->get('refrelation_'.$i);


				$empRef_insert = new Emp_refren;
				$empRef_insert->name = $refName;
				$empRef_insert->contact = $contact;
				$empRef_insert->relation = $relation;
				$empRef_insert->empID = $emp_ID;
				$empRef_insert->save();
			}
		}
		//emp Prefec insert
		if($request->get('location') && !empty($request->get('location')) 
				&& $request->get('department') && !empty($request->get('department'))
				&& $request->get('np') && !empty($request->get('np')) 
				&& $request->get('ctc') && !empty($request->get('ctc')) 
				&& $request->get('ectc') && !empty($request->get('ectc')) 
			)
			{
				$empPre_insert = new Emp_pref;
				$empPre_insert->location = $request->get('location');
				$empPre_insert->department = $request->get('department');
				$empPre_insert->noticePeriod = $request->get('np');
				$empPre_insert->CTC = $request->get('ctc');
				$empPre_insert->ECTC = $request->get('ectc');
				$empPre_insert->empID = $emp_ID;
				$empPre_insert->save();
			}
		$data['success'] = 'success';
        $data['message'] =  'Inserted Successfully';
        $data['Employee']  = $employeedata_insert;
        return Response::json($data);

    }

    public function list()
    {

    	$getEmployeeData = Employee::orderBy('id','DESC')->get();
    	// Emp_technology::with(['Employee','Technologies'])->get();
    	return view('ApplyJob.jobEmployeeList',['getEmployeeData' => $getEmployeeData]);
    }

    public function edit($id)
    {
    	$langLevel = '';
    	$technoLevel = '';
    	$techonolgy = Techonolgy::where('status','=','active')->get();
    	$language  = Languages::get();
    	$editEmployeeData = Employee::where('id','=',$id)->first();
    	$editEmpEduction = Education::where('empID','=',$id)->get();
    	$editEmpExper = Emp_experince::where('empID','=',$id)->get();
    	$editEmpLanguage = Emp_language::where('empID','=',$id)->first();
    	if($editEmpLanguage){
		$langLevel = explode(",",$editEmpLanguage->level);
		}
		$editEmpTechnology = Emp_technology::where('empID','=',$id)->first();
		if($editEmpTechnology){
		$technoLevel = explode(",",$editEmpTechnology->level);
		}
		$editEmpRefre = Emp_refren::where('empID','=',$id)->get();
		$editEmpPref = Emp_pref::where('empID','=',$id)->first();
    	return view('ApplyJob.updateEmployeeForm',
    		[
    		'editEmployeeData' => $editEmployeeData,
    		'editEmpEduction'  => $editEmpEduction,
    		'editEmpExper' 	   => $editEmpExper,
    		'editEmpLanguage' => $editEmpLanguage,
    		'langLevel'		  => $langLevel,
    		'editEmpTechnology' => $editEmpTechnology,
    		'technoLevel'	 => $technoLevel,
    		'editEmpRefre'	=>  $editEmpRefre,
    		'editEmpPref'   =>  $editEmpPref,
    		'techonolgy' => $techonolgy,
    		'language' => $language
    		]);
    }

    public function update(Request $request,$id)
    {
    	$data = array();
		//update in emp table
		$employeedata_update = Employee::find($id);
		$employeedata_update->firstName = $request->get('fname');
		$employeedata_update->lastName = $request->get('lname');
		$employeedata_update->email = $request->get('email');
		$employeedata_update->designation = $request->get('designation');
		$employeedata_update->phoneNo = $request->get('phone');
		$employeedata_update->gender = $request->get('gender');
		$employeedata_update->relationStatus = $request->get('relation');
		$employeedata_update->dob = $request->get('dob');
		$employeedata_update->address =$request->get('add');
		$employeedata_update->state = $request->get('state');
		$employeedata_update->city = $request->get('city');
		$employeedata_update->zipCode = $request->get('zip');
		$employeedata_update->save();

		
		//emp Education update
		$Education_cnt = $request->get('cntEduc');
		for ($i=0; $i<$Education_cnt; $i++) { 
			if($request->get('class')[$i] && !empty($request->get('class')[$i]) 
				&& $request->get('nameBoard')[$i] && !empty($request->get('nameBoard')[$i])
				&& $request->get('pasyear')[$i] && !empty($request->get('pasyear')[$i])
				&& $request->get('perc')[$i] && !empty($request->get('perc')[$i]) 
			)
			{
				
				$className = $request->get('class')[$i];
				$boardName = $request->get('nameBoard')[$i];
				$pasingYear = $request->get('pasyear')[$i];
				$percenatge = $request->get('perc')[$i];

				$empEducation_update = Education::where('empID','=',$id)->update(['className' => $className,'boardName' => $boardName,'year' => $pasingYear,'percenatge' => $percenatge]);
			}
		}
		//emp Experience update
		$Exper_cnt = $request->get('cntExp');
		for($i=1; $i <= $Exper_cnt; $i++) { 
			if($request->get('companyName_'.$i) && !empty($request->get('companyName_'.$i)) && $request->get('desi_'.$i) && !empty($request->get('desi_'.$i))
				&& $request->get('from_'.$i) && !empty($request->get('from_'.$i))
				&& $request->get('to_'.$i) && !empty($request->get('to_'.$i)) 
			)
			{
				$companyName = $request->get('companyName_'.$i);
				$desig = $request->get('desi_'.$i);
				$from = $request->get('from_'.$i);
				$to = $request->get('to_'.$i);

				$empExp_update = Emp_experince::where('empID','=',$id)->update(['companyName'=>$companyName,'designation' => $desig , 'from' => $from , 'to' => $to]);
			}
		}
		//emp language update
		$tech_cnt = 0;
		$lang_cnt = 0;
		$lang_cnt = $request->get('cnt_lang');
		for ($i=0; $i<$lang_cnt; $i++) { 
			if(!empty($request->get('Lang')[$i]) 
			)
			{
				$langID = $request->get('Lang')[$i];	
				$langLevel = $request->get('level_'.$langID);
				if($request->get('level_'.$langID)){
	        		$level   = implode(',',$request->get('level_'.$langID));
	        	}
				$empLang_update = Emp_language::where('empID','=',$id)->update(['langID' => $langID,'level'=>$level]);
			}
		}
		//emp technology update

		$tech_cnt = $request->get('cnt_tech');
		for ($i=0; $i<$tech_cnt ; $i++) { 
			if(!empty($request->get('tech')[$i]) 
			)
			{
				$techID = $request->get('tech')[$i];
				$level = $request->get('techlevel_'.$techID);

				$empTech_update = Emp_technology::where('empID','=',$id)->update(['techID' => $techID,'level'=>$level]);
			}
		}
		//emp Refernce update
		$Ref_cnt = $request->get('cntRef');
		for ($i=1; $i <= $Ref_cnt ; $i++) { 
			if($request->get('refName_'.$i) && !empty($request->get('refName_'.$i)) 
				&& $request->get('refContact_'.$i) && !empty($request->get('refContact_'.$i))
				&& $request->get('refrelation_'.$i) && !empty($request->get('refrelation_'.$i)) 
			)
			{
				$refName = $request->get('refName_'.$i);
				$contact = $request->get('refContact_'.$i);
				$relation = $request->get('refrelation_'.$i);


				$empRef_update = Emp_refren::where('empID','=',$id)->update(['name' => $refName,'contact'=>$contact,'relation' => $relation]);
			}
		}
		//emp Prefec update
		if($request->get('location') && !empty($request->get('location')) 
				&& $request->get('department') && !empty($request->get('department'))
				&& $request->get('np') && !empty($request->get('np')) 
				&& $request->get('ctc') && !empty($request->get('ctc')) 
				&& $request->get('ectc') && !empty($request->get('ectc')) 
			)
			{
				$empPre_update = Emp_pref::where('empID','=',$id)->update(['location' => $request->get('location'),'department'=> $request->get('department'),'noticePeriod' => $request->get('np'),'CTC' => $request->get('ctc') , 'ECTC' => $request->get('ectc')]);
			}
		$data['success'] = 'success';
        $data['message'] =  'Updated Successfully';
        $data['Employee']  = $employeedata_update;
        return Response::json($data);
    }

    public function delete(Request $request){
        $data = array();
        $id  = $request->get('delete_id');
        if($id){
            $employeeDelete = Employee::where('id','=',$id)->forcedelete();
            Education::where('empID','=',$id)->forcedelete();
            Emp_experince::where('empID','=',$id)->forcedelete();
            Emp_language::where('empID','=',$id)->forcedelete();
            Emp_technology::where('empID','=',$id)->forcedelete();
            Emp_pref::where('empID','=',$id)->forcedelete();
            Emp_refren::where('empID','=',$id)->forcedelete();

            $data['success'] = 'success';
            $data['message'] = 'Deleted Employee Successfully';
        }
        return $data;
    }
}
