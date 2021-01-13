<?php

use Illuminate\Database\Seeder;
use App\Models\Languages;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languageArray = array(array(1, 'Hindi'),
								array(2, 'Gujarati'),
								array(3, 'English'),
								array(4, 'Marathi'));
        $languageNameArray = array();
		foreach ($languageArray as $key => $value) {
            $createArray = array();
            if(!in_array($value[1], $languageNameArray)){
            	array_push($languageNameArray, $value[1]);
	            $createArray['name']  = $value[1];

	            Languages::create($createArray);
            }
        }
    }
}
