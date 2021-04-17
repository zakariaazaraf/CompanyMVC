
<?php require APPROOT . '/views/includes/head.php'; ?>

<section class='posts-container'>
    <!-- Call The Navigation Bar -->
    <?php require APPROOT . '/views/includes/navigation.php'; ?>
    <div class="wrapper">
            <?php if(isLogedin()):?>
                <a class='btn green' href="<?php echo URLROOT ; ?>/posts/create">create</a>
            <?php endif;?>
            
            <?php foreach($data['posts'] as $post):?>
                <div class="post">
                    <h2 class='post-title'>
                        <?php echo $post->title ?>
                    </h2>
                    <p class='post-date'>
                        created at: <?php echo date('F j h:m', strtotime($post->created_at)) ?>
                    </p>
                    <p class='post-desc'>
                        <?php echo $post->description?>
                    </p>
                    <div class='post-buttons'>
                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post->user_id):?>
                            <a class='btn orange' href="<?php echo URLROOT . "/posts/update/" . $post->id; ?>">update</a>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post->user_id):?>
                            <form action="<?php echo URLROOT . "/posts/delete/" . $post->id ?>" method='POST'>
                                <input type="submit" name='delete' value='Delete' class='btn red' />
                            </form>        
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach ;?>
            
        
    </div>
</section>


