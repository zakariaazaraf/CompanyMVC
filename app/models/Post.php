<?php

    class Post {

        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getAllPosts(){
            $this->db->query('SELECT * FROM posts ORDER BY created_at DESC');
            $posts = $this->db->resultSet();
            return $posts;
        }

        public function getPost(){
            $this->db->query('SELECT * FROM posts WHERE id = ?');
            //$this->db->query('id', $id, INT);
            $post = $this->db->single();
            return $post;
        }

        public function addPost($data){
            $this->db->query('INSERT INTO posts (title, description, user_id) VALUES (:title, :description, :user_id)');

            // BIND THE DATA
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['content']);
            $this->db->bind(':user_id', $data['user_id']); 

            return $this->db->execute() ? true : false;
        }

        public function updatePost($data){
            $this->db->query('UPDATE posts SET title = :title, description = :description WHERE id = :post_id');
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['content']);
            $this->db->bind(':post_id', $data['post_id']);

            return $this->db->execute() ? true : false ;
        }

        public function deletePost($id){
            $this->db->query('DELETE FROM posts WHERE id = :post_id');
            $this->db->bind(':post_id', $id);

            return $this->db->execute() ? true : false ;
        }

        public function getPostById($id){
            $this->db->query('SELECT * FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);
            return $this->db->single();
        }

    }