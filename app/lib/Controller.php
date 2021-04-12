<?php

    // LOAD THE MODEL AND THE VIEW
    class Controller{
        
        public function model($model){
            // REQUIRE MODEL
            require_once '../app/models/' . $model . '.php';
            
            // INSTANTIATE MODEL CLASS
            return new $model();
        }
        public function view($view, $data = []){
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
                return;
            }
            die('View Not Found ...');
        }   

    }