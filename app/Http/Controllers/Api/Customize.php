<?php
    namespace App\Http\Controllers\Api ;

    class Customize {
        public $make ;
        public $model ;
        public $year ;

        public function __construct( $make , String $model , $year) {
            $this->make = $make ;
            $this->model = $model ;
            $this->year  = $year ;
        }
    }


?>