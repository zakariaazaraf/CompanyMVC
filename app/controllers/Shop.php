<?php

    class Shop extends Controller{

        public function __construct(){
            
        }

        public function man(...$args){
            echo 'Man From Controller Method';
            echo '<pre>';
            print_r($args);
            echo '</pre>';
            $this->view('man');
        }

        
    }