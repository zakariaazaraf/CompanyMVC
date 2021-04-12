<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post index view</title>
</head>
<body>
    <h1>Hello from posts view</h1>
    <?php
        foreach($data['posts'] as $post){
            echo $post->id . '<br />';
            echo $post->title . '<br />';
            echo $post->description . '<br />';
            echo $post->created_at . '<br />';
        }
    ?>
</body>
</html>