<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users view</title>
</head>
<body>
    <h1>User View</h1>
    <?php

        foreach($data['users'] as $user){
            echo $user->id . '<br />';
            echo $user->firstname . '<br />';
            echo $user->lastname . '<br />';
            echo $user->email . '<br />';
            echo $user->joined_at . '<br />';

            echo '<br />';
            echo '<br />';
            echo '<br />';
        }
    
    ?>
</body>
</html>