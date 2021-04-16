    <?php require APPROOT . '/views/includes/head.php'; ?>
    <?php require APPROOT . '/views/includes/navigation.php'; ?>

<div class="form-container post-form">
    <h2>Create Post</h2>
    <form action="<?php echo URLROOT; ?>/posts/update" method='POST'>
        <div class="input-group">
            <label for="title">title :</label>
            <input type="text" id='title' name='title' value='<?php echo $data['title']; ?>'>
            <span class='invalidFeedback'>
                <?php echo $data['titleError']; ?>
            </span>
        </div>
        <div class="input-group">
            <label for="user">user :</label>
            <select id='user' name='user'>
                <option value="">--Please choose an option--</option>
                <?php foreach($data['users'] as $user):?>
                    <option value="<?php echo $user->id?>" <?php echo $user->id == $data['user'] ? selected : '' ?> >
                        <?php echo $user->firstname?>
                    </option>
                <?php endforeach;?>
            </select>
            <span class='invalidFeedback'>
                <?php echo $data['userError']; ?>
            </span>
        </div>
        <div class="input-group">
            <label for="content">content :</label>
            <textarea name="content" id="content" cols="30" rows="10" placeholder='content *'>
                <?php echo $data['content']; ?>
            </textarea>
            <span class='invalidFeedback'>
                <?php echo $data['contentError']; ?>
            </span>
        </div>

        <button class='submit' type='submit' value='register' >update</button>
    </form>
</div>