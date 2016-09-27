<?php
	// configuration
	require("../includes/config.php");
	
	// if user reached page via GET (as by clicking a link of via redirect)
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		// render form
		render("sell_form.php", ["title" => "Sell Stock"]);
	}
	
	// else if the user reached page via POST (as by submitting a form via POST)
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$row = CS50::query("SELECT * FROM shares WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
		// if the user left the symbol form blank
		if ($_POST["symbol"] == "")
		{
			render("sell_form.php", ["title" => "Sell Stock", "problem" => "form_not_filled"]);
		}
		
		// if the user doesn't own that stock (or it doesn't exist)
		else if (count($row) == 0)
		{
			render("sell_form.php", ["title" => "Sell Stock", "problem" => "symbol_not_found"]);
		}
		
		// alright, found. consider it sold, sir
		else
		{
			$company = lookup($_POST["symbol"]);
			CS50::query("UPDATE users SET cash = cash + ? WHERE  id = ?", $row[0]["shares"] * $company["price"], $_SESSION["id"]);
			CS50::query("DELETE FROM shares WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
			
			// history saving
        	CS50::query("INSERT INTO history(user_id, type, symbol, shares, price_per_share, total, date_time) VALUES (?, ?, ?, ?, ?, ?, NOW())", $_SESSION["id"], 'Sale', strtoupper($_POST["symbol"]), $row[0]["shares"], $company["price"], $row[0]["shares"] * $company["price"]);
			
			render("sell_form.php", ["title" => "Sell Stock", "successful" => $row[0]["shares"] * $company["price"]]);
		}
	}
?>