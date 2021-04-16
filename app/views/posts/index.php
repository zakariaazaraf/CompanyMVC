
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
                </div>
            <?php endforeach ;?>
            
        
    </div>
</section>


