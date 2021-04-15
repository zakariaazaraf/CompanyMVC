    <?php require APPROOT . '/views/includes/head.php'; ?>
    <?php require APPROOT . '/views/includes/navigation.php'; ?>

<div class="form-container">
    <form action="<?php echo URLROOT; ?>/users/register" method='POST'>
        <h2>register</h2>
        <div class="input-group">
            <label for="firstname">firstname :</label>
            <input type="text" id='firstname' name='firstname' value='<?php echo $data['firstname'] ? $data['firstname']: '' ?>'>
            <span class='invalidFeedback'>
                <?php echo $data['firstnameError'] ?>
            </span>
        </div>
        <div class="input-group">
            <label for="lastname">lastname :</label>
            <input type="text" id='lastname' name='lastname' value='<?php echo $data['lastname'] ? $data['lastname']: '' ?>'>
            <span class='invalidFeedback'>
                <?php echo $data['lastnameError'] ?>
            </span>
        </div>
        <div class="input-group">
            <label for="email">email :</label>
            <input type="email" id='email' name='email' value='<?php echo $data['email'] ? $data['email']: '' ?>'>
            <span class='invalidFeedback'>
                <?php echo $data['emailError'] ?>
            </span>
        </div>
        <div class="input-group">
            <label for="password">password :</label>
            <input type="password" id='password' name='password' value='<?php echo $data['password'] ? $data['password']: '' ?>'>
            <span class='invalidFeedback'>
                <?php echo $data['passwordError'] ?>
            </span>
        </div>
        <div class="input-group">
            <label for="confirmPass">confirm password :</label>
            <input type="password" id='confirmPass' name='confirmPassword' value='<?php echo $data['confirmPassword'] ? $data['confirmPassword']: '' ?>'>
            <span class='invalidFeedback'>
                <?php echo $data['confirmPasswordError'] ?>
            </span>
        </div>
        <button class='submit' type='submit' value='register' >register</button>
    </form>
</div>