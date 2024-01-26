<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class GradeAndCarModelExist implements ValidationRule
{

    public $existedId ;

    public function __construct($id) {
        $this->existedId = $id;   
    }

    public function passes($attribute , $value) {
        $grade = $value['grade'] ?? null ;
        $carModelId = $value['carModel_id'] ?? null ;

        return DB::table('grades')
                    ->where('grade' , $grade)
                    ->where('carModel_id' , $carModelId)
                    ->where('id', '<>' , $this->existedId )
                    ->exists();
    }

    public function message () 
    {
        return 'this is alrady taken or what ';
    }
}
