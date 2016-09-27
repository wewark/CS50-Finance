<div class="error_msg">
    <?php
        if (isset($problem))
        {
            if ($problem == "forms_not_filled")
            {
                echo "Please fill all the forms";
            }
            else if ($problem == "wrong_shares")
            {
                echo "Please enter a non-negative number of shares, only chars 0-9 allowed";
            }
            else if ($problem == "symbol_not_found")
            {
                echo "Symbol not found";
            }
            else if ($problem == "not_enough_balance")
            {
            	echo "Not enough balance to buy the given number of shares";
            }
        }
        else if (isset($successful))
        {
        	echo "<span style='color:green'>Shares bought successfully, they cost $" . number_format($successful, 2, '.', ',') . "</span>";
        }
    ?>
</div>
<form action="buy.php" method="post">
	<fieldset>
		<div class="form-group">
			<input autocomplete="off" autofocus class="form-control" name="symbol" placeholder="Symbol" type="text" value="<?=isset($symbol) ? $symbol : ""?>"/>
		</div>
		<div class="form-group">
			<input autocomplete="off" class="form-control" name="shares" placeholder="Shares" type="text"/>
		</div>
		<div class="form-group">
			<button class="btn btn-default" type="submit">
				Buy
			</button>
		</div>
	</fieldset>
</form>
<div>
	or <a href="quote.php">quote</a>
</div>