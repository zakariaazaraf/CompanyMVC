<?php

    class User{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getAllUsers(){
            $this->db->query("SELECT * FROM users");
            $users = $this->db->resultSet();
            return $users;
        }
    }