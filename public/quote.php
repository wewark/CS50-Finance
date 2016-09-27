<?php

	// configuration
	require("../includes/config.php");
	
	// if user reached page via GET (as by clicking a link or via redirect)
	if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("quote_form.php", ["title" => "Quote"] );
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	$quote = lookup($_POST["symbol"]);
    	// if the symbol wasn't found
    	if ($quote == false)
    	{
    		render("quote_form.php", ["title" => "Buy", "problem" => "symbol_not_found"]);
    	}
    	// else render quote result page with associative array $company containing the results
    	else
    	{
    		render("quote_result.php", ["title" => "Buy", "company" => $quote]);
    	}
    }

?>