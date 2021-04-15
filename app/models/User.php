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

        public function register($data){
            // Prepare my query to insert new user
            $this->db->query('INSERT INTO 
                                            users (firstname, lastname, email, password) 
                                        VALUES 
                                            (:firstname, :lastname, :email, :password)
                            ');

            // Bind params
            $this->db->bind(':firstname', $data['firstname']);
            $this->db->bind(':lastname', $data['lastname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            if($this->db->execute()){
                return true;
            }
            return false;
            
        }
    }