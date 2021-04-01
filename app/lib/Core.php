<?php

    class Core{
        protected $currentController = 'Page';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            $url = $this->getUrl();

            // CEHCK IF THE CONTOLLER EXISTS
            if(file_exists('../app/controllers/'. $url[0] . '.php')){
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }

            // REQUIRE THE CONTROLLER BOTH WAYS IF EXISTS OR NOT
            require_once '../app/controllers/' . $this->currentController . '.php';

            // INSTANSIATE THE CONTROLLER CLASS
            $this->currentController = new $this->currentController(); // new $this->currentController same
            

            if(isset($url[1])){ // IF THERE'S ANY METHOD AFTER THE CONTROLLER

                // CHECK THE METHOD FROM THE CONTROLLER CLASS WE INITIATITE PREVIOUSLY
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];                
                    unset($url[1]);
                }
            }

            // GET THE PARAMS 
            $this->params = $url && array_values($url);
        }

        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');

                $url = filter_var($url, FILTER_SANITIZE_URL);

                $url = explode('/', $url);
                return $url;
            }
        }
    }