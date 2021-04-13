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

        public function create(){
            $this->view('posts/create');
        }

        public function update(){
            $post = $this->postModel->single();
            $this->view('posts/update');
        }

        public function delete(){
            $this->view('posts/delete');
        }
    }