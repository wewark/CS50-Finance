<?php

    // configuration
    require("../includes/config.php"); 
    
    // gather shares' info about the user
    $rows = CS50::query("SELECT * FROM shares WHERE user_id = ?", $_SESSION["id"]);
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"]
            ];
        }
    }
    $user = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    // render portfolio
    render("portfolio.php", ["title" => "Portfolio", "positions" => $positions, "user" => $user[0]]);

?>
