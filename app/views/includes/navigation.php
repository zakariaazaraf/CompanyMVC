<nav class='top-nav'>
    <ul>
        <li><a href="<?php echo URLROOT ?>/pages/index">Home</a></li>
        <li><a href="<?php echo URLROOT ?>/pages/about">About</a></li>
        <li><a href="<?php echo URLROOT ?>/pages/contact">contact</a></li>
        <li><a href="<?php echo URLROOT ?>/pages/info">info</a></li>
        <li>
            <?php if(isLogedIn()) :?>
                <a class='btn login' href="<?php echo URLROOT ?>/users/logout">logout</a>          
            <?php else :?>
                <a class='btn login' href="<?php echo URLROOT ?>/users/login">login</a>
            <?php endif;?>
        </li>        
    </ul>
</nav>