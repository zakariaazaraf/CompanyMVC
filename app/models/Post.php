<?php

    class Post {
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getAllPosts(){
            $this->db->query('SELECT * FROM posts');
            $posts = $this->db->resultSet();
            return $posts;
        }

        public function getPost(){
            $this->db->query('SELECT * FROM posts WHERE id = ?');
            //$this->db->query('id', $id, INT);
            $post = $this->db->single();
            return $post;
        }
    }