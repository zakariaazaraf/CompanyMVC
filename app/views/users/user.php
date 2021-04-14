    <?php require APPROOT . '/views/includes/head.php'; ?>
    <?php require APPROOT . '/views/includes/navigation.php'; ?>
    <h1>User View</h1>
    <h3>
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
    </h3>
</body>
</html>