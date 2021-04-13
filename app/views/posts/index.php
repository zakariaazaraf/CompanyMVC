
    <?php require APPROOT . '/views/includes/head.php'; ?>

    <h1>Hello from posts view</h1>
    <h3>
    <?php
    
        foreach($data['posts'] as $post){

            echo 'Id : ' . $post->id . '<br />';
            echo 'Title : ' . $post->title . '<br />';
            echo 'Description : ' . $post->description . '<br />';
            echo 'Created on : '. date('F j h:m', strtotime($post->created_at)) . '<br />';

            echo '<br />';
            echo '<br />';
            echo '<br />';
        }
    ?>
    </h3>
<!-- </body>
</html> -->