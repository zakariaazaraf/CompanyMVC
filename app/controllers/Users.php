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
                'email' => '',
                'passowrd' => '',
                'emailError' => '',
                'passwordError' => ''
            ];

            // CHECK THE REQUEST METHOD 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                // Sanitize Post Data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data['email'] = trim($_POST['email']);
                $data['password'] = trim($_POST['password']);
        
                // Start Validate Form Fields

                // Email Filed Validation
                if(empty($data['email'])){
                    $data['emailError'] = 'Please Enter The Email.';
                }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                    $data['emailError'] = 'Please Enter Valide Format';
                }

                // Email Filed Validation
                if(empty($data['password'])){
                    $data['passwordError'] = 'Please Enter The Password.';
                }

                $isValidEmail = empty($data['emailError']) ? true : false ;
                $isValidPassword = empty($data['passwordError']) ? true : false ;

                if($isValidEmail && $isValidPassword){

                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                    if($loggedInUser){
                        $this->createUserSession($loggedInUser);
                        $this->view('posts/index');
                        return;
                    }else{
                        $data['emailError'] = 'Email Or Password Uncorrect.';
                        $data['passwordError'] = 'Email Or Password Uncorrect.';
                        $this->view('users/login', $data);
                        
                    }
                }

            }else{
                 $data = [
                    'email' => '',
                    'passowrd' => '',
                    'emailError' => '',
                    'passwordError' => ''
                ];
            }

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

            // CHECK THE REQUET METHOD
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize Form 
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data['firstname'] = trim($_POST['firstname']);
                $data['lastname'] = trim($_POST['lastname']);
                $data['email'] = trim($_POST['email']);
                $data['password'] = trim($_POST['password']);
                $data['confirmPassword'] = trim($_POST['confirmPassword']);

                // VALIDATE FORM FIELDS 
                $nameValidate = "/^[a-zA-Z0-9]*$/";
                //$passwordValidate = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
                $passwordValidate = "^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$";

                // Validate firstname if only contain chars
                if(empty($data['firstname'])){
                    $data['firstnameError'] = 'Please Enter firstname.';
                } elseif(!preg_match($nameValidate, $data['firstname'])){
                    $data['firstnameError'] = 'firstname can only contain characters.';
                }

                // Validate lastname if only contain chars
                if(empty($data['lastname'])){
                    $data['lastnameError'] = 'Please Enter lastname.';
                } elseif(!preg_match($nameValidate, $data['lastname'])){
                    $data['lastnameError'] = 'lastname can only contain characters.';
                }

                // Validate email
                if(empty($data['email'])){
                    $data['emailError'] = 'Please enter an email.';
                }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                    $data['emailError'] = 'Please Enter The correct format.';
                }else{
                    if($this->userModel->emailExists($data['email'])){
                        $data['emailError'] = 'Email Already Exists, Try onther One.';
                    }
                }

                // Validate password
                if(empty($data['password'])){
                    $data['passwordError'] = 'Please Enter The Password';
                }elseif(strlen($data['password']) < 8){
                    $data['passwordError'] = 'Plese Enter Strong Password';
                }elseif(!preg_match($nameValidate, $data['password'])){
                    $data['passwordError'] = 'Please Enter A Valide Password';
                }

                if(empty($data['confirmPassword'])){
                    $data['confirmPasswordError'] = 'Please Enter Confirmed Password';
                } elseif($data['password'] != $data['confirmPassword']){
                    $data['confirmPasswordError'] = 'Please Enter Identical Password';
                }

                $isValidFirstname = empty($data['firstnameError']) ? true : false;
                $isValidLastname = empty($data['lastnameError']) ? true : false;
                $isValidEmail = empty($data['emailError']) ? true : false;
                $isValidPassword = empty($data['passwordError']) ? true : false;
                $isValidConfirmPassword = empty($data['confirmPasswordError']) ? true : false;

                if($isValidFirstname && $isValidLastname && $isValidEmail && $isValidPassword && $isValidConfirmPassword){

                    // HASH THE PASSWORD
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if($this->userModel->register($data)){
                        header('location:' . URLROOT . '/users/login');
                    }else{
                        die('Something Went Wrrong ...');
                    }
                }
            }

            $this->view('users/register', $data);
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['email']);
            header('location:' . URLROOT . '/users/login');
            
        }
    }