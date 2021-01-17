<?php

   
    echo "<pre>";
    print_r(explode('/', trim($_SERVER['REQUEST_URI'], '/')));
    echo "</pre>";