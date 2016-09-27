<div class="error_msg">
    <?php
        if (isset($problem))
        {
            if ($problem == "forms_not_filled")
            {
                echo "Please fill all the forms";
            }
            else if ($problem == "user_exists")
            {
                echo "This username is already taken";
            }
            else
            {
                echo "Password and confirmation must match";
            }
        }
    ?>
</div>
<form action="register.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text" value="<?= isset($username_value) ? $username_value : ""?>"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Register
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a>
</div>
