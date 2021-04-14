<?php

    class Users extends Controller{

        public function __construct(){
            $this->userModel = $this->model('User');
        }

        public function index(){
            $users = $this->userModel->getAllUsers();
            $data = [
                'users' => $users
            ];
            $this->view('users/user', $data);
        }

        public function login(){
            // Fetch Needed Data

            $this->view('users/login');
        }

        public function register(){
            $this->view(('users/register'));
        }
    }