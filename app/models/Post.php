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
            $this->db->query('INSERT INTO posts (title, description) VALUES (:title, :description)');
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['content']);

            return $this->db->execute() ? true : false;
        }
    }