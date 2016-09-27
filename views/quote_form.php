<div class="error_msg">
	<?php if (isset($problem)): ?>
		Symbol not found
	<?php endif ?>
</div>
<form action="quote.php" method="post">
	<fieldset>
		<div class="form-group">
			<input autocomplete="off" autofocus class="form-control" name="symbol" placeholder="Symbol" type="text"/>
		</div>
		<div class="form-group">
			<button class="btn btn-default" type="submit">
				Search
			</button>
		</div>
	</fieldset>
</form>