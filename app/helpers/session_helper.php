<?php

    session_start();

    function isLogedIn(){
        return isset($_SESSION['user_id']) ? true : false;
    }