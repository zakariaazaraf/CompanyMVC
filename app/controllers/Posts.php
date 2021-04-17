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

        public function update($id){
            $post = $this->postModel->getPostById($id) ;

            // CHECK IF THE UPDATER USER HAVE THE ACCESS TO THIS FUNCTIONALITY
            if(!islogedIn()){
                header('location:' . URLROOT . '/posts/index');
                return;
            }
            if($post->user_id != $_SESSION['user_id']){
                header('location:' . URLROOT . '/posts/index');
                return;
            }

            $data = [
                'post' => $post,
                'title' => '',
                'content' => '',
                'titleError' => '',
                'contentError' => '',
                'post_id' => $post->id
            ];

            // CHECK IF THE REQUEST METHOD IS POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data['title'] = $_POST['title'];
                $data['content'] = $_POST['content'];

                if(empty($data['title'])){
                    $data['titleError'] = 'Please Fill Post\'s Title.';
                }

                if(empty($data['content'])){
                    $data['contentError'] = 'Please Fill Post\'s Content.';
                }

                /****************************************************************************/
                /***** YOU COULD CHECK IF THE DATA AFTER UPDATE IS THE SEEM AS BEFORE *******/
                /*********** SO YOU AVOID UNNECESSARY REQUEST TO THE DATABASE  ***************/
                /****************************************************************************/

                $titleUpdated = $data['title'] == $this->postModel->getPostById($id)->title ? true : false ;
                $contentUpdated = $data['content'] == $this->postModel->getPostById($id)->description ? true : false;

                if($titleUpdated && $contentUpdated){
                    
                    $data['titleError'] = 'You Haven\'t Updated The Title Neither Content';
            
                    $data['contentError'] = 'You Haven\'t Updated The Content Neither Title';
                    
                }
              


                $isValidTitle = empty($data['titleError']) ? true : false;
                $isValidContent = empty($data['contentError']) ? true : false;

                if($isValidTitle && $isValidContent){
                    if($this->postModel->updatePost($data)){
                        header('location:' . URLROOT . '/posts/index');
                        return;
                    }
                    die('Something Went Wrong ...');
                }
            }
            $this->view('posts/update', $data);
        }

        public function delete($id){
            $post = $this->postModel->getpostById($id);

            // CHECK THE ACCESSIBLITY FOR THIS FUNCTIONALITY
            if(!isLogedIn()){
                header('location:' . URLROOT . '/posts');
                return;
            }
            if($post->user_id != $_SESSION['user_id']){
                header('location:' . URLROOT . '/posts');
                return;
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if($this->postModel->deletePost($id)){
                    header('location:' . URLROOT . '/posts');
                    return;
                }
                die('Something Went Wrrong ...');
                return;
            }
            $this->view('posts');
        }
    }