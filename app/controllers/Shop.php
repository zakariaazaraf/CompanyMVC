<?php

    class Shop{

        public function __construct(){
            echo 'Shop Construct';
        }

        public function man(){
            echo 'Man From Controller Method';
        }

        public $man = 'man para from the shop' ;
    }