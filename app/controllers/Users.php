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
            $data = [
                'title' => 'login page',
                'emailError' => '',
                'passwordError' => ''
            ];
            $this->view('users/login', $data);
        }

        public function register(){
            $data = [
                'title' => 'register page',
                'firstname' => '',
                'lastname' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'firstnameError' => '',
                'lastnameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''

            ];
            $this->view('users/register', $data);
        }
    }