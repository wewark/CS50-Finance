<?php

	// configuration
	require("../includes/config.php");
	
	// if user reached page via GET (as by clicking a link of via redirect)
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		// render form
		render("register_form.php", ["title" => "Register"]);
	}
	
	// else if the user reached page via POST (as by submitting a form via POST)
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// TODO
		// if the user left any entry blank
		if ($_POST["username"] == "" ||
			$_POST["password"] == "" ||
			$_POST["confirmation"] == "")
		{
			render("register_form.php", ["title" => "Register", "problem" => "forms_not_filled", "username_value" => $_POST["username"]]);
		}
		// else if password and confirmation doesn't match
		else if ($_POST["password"] != $_POST["confirmation"])
		{
			render("register_form.php", ["title" => "Register", "problem" => "confirmation", "username_value" => $_POST["username"]]);
		}
		// register the user
		else
		{
			$reg = CS50::query("INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));
			if ($reg == 0)
			{
				render("register_form.php", ["title" => "Register", "problem" => "user_exists", "username_value" => $_POST["username"]]);
			}
			else
			{
				$rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
				$_SESSION["id"] = $rows[0]["id"];
				redirect("index.php");
			}
		}
	}
?>