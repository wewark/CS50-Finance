<div>
	<?php if (count($positions) != 0): ?>
		<table class="table_hover" style="align: center;">
			<tr>
				<td class="table_header">Symbol</td>
				<td class="table_header">Shares owned</td>
				<td class="table_header">Current price</td>
			</tr>
			<?php foreach($positions as $position): ?>
			<tr>
				<td class="quote"><?= $position["symbol"] ?></td>
				<td class="quote"><?= $position["shares"] ?></td>
				<td class="quote">$<?= number_format($position["price"], 2, '.', ',') ?></td>
			</tr>
			<?php endforeach ?>
		</table>
	<?php else: ?>
		<h1 style="opacity: 0.1; text-align: center; font-size: 420%; padding: 50px;">No shares owned</h1>
	<?php endif ?>
</div>
