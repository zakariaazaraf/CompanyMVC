<?php

    class Posts extends Controller{

        public function __construct(){
            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }

        public function index(){
            $posts = $this->postModel->getAllPosts();
            $data = [
                'posts'=> $posts
            ];
            $this->view('/posts/index', $data);
        }

        public function create(){

            
            // CHECK THE THE USER AUTHONTICATION
            if(!isLogedin()){
                header('location:' . URLROOT . 'posts/index');
                return;
            }

            $data = [
                'title' => '',
                'user_id' => $_SESSION['user_id'],
                'content' => '',
                'titleError' => '',
                'userError' => '',
                'contentError' => ''
            ];

            // IF THE USER SEND PODT DATA
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data['title'] = trim($_POST['title']);
                $data['content'] = trim($_POST['content']);

                if(empty($data['title'])){
                    $data['titleError'] = 'Plase Enter The Post Title.';
                }

                if(empty($data['content'])){
                    $data['contentError'] = 'Please Fill The Post\'s Content.';
                }

                $isValidTitle = empty($data['titleError']) ? true : false;
                $isValidContent = empty($data['contentError']) ? true : false;

                if($isValidTitle && $isValidContent){
                    if($this->postModel->addPost($data)){
                        header('location:' . URLROOT . '/posts/index');
                        return;
                    }else{
                        die('Something Went Wrrong Try Again ...');
                    }       
                }
            }

            $this->view('posts/create', $data);
        }

        public function update(){
            $post = $this->postModel->single();
            $this->view('posts/update');
        }

        public function delete(){
            $this->view('posts/delete');
        }
    }