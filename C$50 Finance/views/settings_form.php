<div class="error_msg">
    <?php
        if (isset($problem))
        {
            if ($problem == "forms_not_filled")
            {
                echo "Please fill all the forms";
            }
            else if ($problem == "confirmation")
            {
                echo "New password and confirmation must match";
            }
            else if ($problem == "wrong_password")
            {
                echo "Wrong password";
            }
        }
    ?>
</div>
<form action="settings.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" class="form-control" name="full_name" placeholder="Full Name" type="text" value="<?= CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"])[0]["full_name"] ?>"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="current_password" placeholder="Current Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="new_password" placeholder="New Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirm Password" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                Save
            </button>
        </div>
    </fieldset>
</form>