<?php

	// configuration
	require("../includes/config.php");
	
	// if user reached page via GET (as by clicking a link or via redirect)
	if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("buy_form.php", ["title" => "Buy Stock"] );
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (!preg_match("/^\d+$/", $_POST["shares"]))
        {
            render("buy_form.php", ["title" => "Buy Stock", "problem" => "wrong_shares", "symbol" => $_POST["symbol"]]);
        }
        else if ($_POST["symbol"] == "" || $_POST["shares"] == "")
        {
        	render("buy_form.php", ["title" => "Buy Stock", "problem" => "forms_not_filled"]);
        }
        else
        {
        	$quote = lookup($_POST["symbol"]);
        	$buyer = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        	// if the symbol wasn't found
        	if ($quote == false)
        	{
        		render("buy_form.php", ["title" => "Buy Stock", "problem" => "symbol_not_found"]);
        	}
        	// the user is not rich enough
        	else if ($quote["price"] * $_POST["shares"] > $buyer[0]["cash"])
        	{
        	    render("buy_form.php", ["title" => "Buy Stock", "problem" => "not_enough_balance"]);
        	}
        	// everything ok, initiate purchase
        	else
        	{
        		CS50::query("INSERT INTO shares (user_id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + ?", $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"], $_POST["shares"]);
        		CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $quote["price"] * $_POST["shares"], $_SESSION["id"]);
        		
        		// history saving
        		CS50::query("INSERT INTO history(user_id, type, symbol, shares, price_per_share, total, date_time) VALUES (?, ?, ?, ?, ?, ?, NOW())", $_SESSION["id"], 'Purchase', strtoupper($_POST["symbol"]), $_POST["shares"], $quote["price"], $quote["price"] * $_POST["shares"]);
        		
        		render("buy_form.php", ["title" => "Buy Stock", "successful" => $quote["price"] * $_POST["shares"]]);
        	}
        }
    }

?>