<?php
    namespace App\Http\Controllers\Api ;

    class Customize {
        public $make ;
        public $model ;
        public $year ;
        public $key ;

        public function __construct( $make , String $model , $year , $key) {
            $this->make = $make ;
            $this->model = $model ;
            $this->year  = $year ;
            $this->key  = $key ;
        }
    }


?>