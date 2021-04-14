    <?php require APPROOT . '/views/includes/head.php'; ?>
    <?php require APPROOT . '/views/includes/navigation.php'; ?>
    
<div class="form-container">
    <form action="<?php echo URLROOT;?>/users/login" method='POST'>
        <h2>login </h2>
        <div class="input-group">
            <label for="email">email :</label>
            <input type="email" id='email' name='email' value='' placeholder='email *'>
            <span class='invalidFeedback'>
                <?php echo $data['emailError'] ?>
            </span>
        </div>
        <div class="input-group">
            <label for="password">password :</label>
            <input type="password" id='password' name='password' value='' placeholder='password *'>
            <span class='invalidFeedback'>
                <?php echo $data['passwordError']; ?>
            </span>
        </div>
        <button class='submit' type='submit' value='submit' >login</button>
        <p class='options'>
            Not registered yet? <a href="<?php echo URLROOT;?>/users/register">create account</a>
        </p>
    </form>
</div>