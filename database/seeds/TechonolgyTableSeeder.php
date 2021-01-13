<?php

use Illuminate\Database\Seeder;
use App\Models\Techonolgy;
class TechonolgyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $technologyArray = array(array(1, 'PHP'),
								array(2, 'MYSQL'),
								array(3, 'Laravel'),
								array(4, 'React'));
        $technologyNameArray = array();
		foreach ($technologyArray as $key => $value) {
            $createArray = array();
            if(!in_array($value[1], $technologyNameArray)){
            	array_push($technologyNameArray, $value[1]);
	            $createArray['name']  = $value[1];

	            Techonolgy::create($createArray);
            }
        }
    }
}
