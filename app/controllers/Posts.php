<?php

    class Posts extends Controller{

        public function __construct(){
            $this->postModel = $this->model('Post');
        }

        public function index(){
            $posts = $this->postModel->getAllPosts();
            $data = [
                'posts'=> $posts
            ];
            $this->view('/posts/index', $data);
        }
    }