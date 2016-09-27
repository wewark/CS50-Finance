<div class="error_msg">
	<?php
		if (isset($problem))
		{
			if ($problem == "form_not_filled")
			{
				echo "Please enter the stock you want to sell";
			}
			else
			{
				echo "Symbol not found";
			}
		}
		else if (isset($successful))
		{
			echo "<span style='color:green'>Stock sold successfully, they were worth $" . number_format($successful, 2, '.', ',') . "</span>";
		}
	?>
</div>
<form action="sell.php" method="post">
	<fieldset>
		<div class="form-group">
			<input autocomplete="off" autofocus class="form-control" name="symbol" placeholder="Symbol to sell" type="text"/>
		</div>
		<div class="form-group">
			<button class="btn btn-default" type="submit">
				Sell
			</button>
		</div>
	</fieldset>
</form>