<?php

    echo 'User View';

    foreach ($data as $user){
        echo '<br />' . $user->username;
        echo '<br />' . $user->email;
    }
    
?>