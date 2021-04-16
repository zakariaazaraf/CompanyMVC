<?php

    class Pages extends Controller {

        public function __construct(){
            $this->userModel = $this->model('User');
        }
        public function about(){
            $this->view('pages/about');
        }

        public function index(...$args){
            /* $users = $this->userModel->getAllUsers();
            $data = [
                'users' => $users
            ]; */
            $this->view('pages/index');
        }
    }