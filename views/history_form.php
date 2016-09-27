<div>
	<?php if (count($rows) != 0): ?>
		<table class="history" style="align: center;">
			<tr>
				<td class="history_header">Date Time</td>
				<td class="history_header">Type</td>
				<td class="history_header">Symbol</td>
				<td class="history_header">Shares Sold/Bought</td>
				<td class="history_header">Price / Share</td>
				<td class="history_header">Total</td>
			</tr>
			<?php foreach(array_reverse($rows) as $row): ?>
			<tr>
				<td class="history_data"><?= $row["date_time"] ?></td>
				<td class="history_data"><?= $row["type"] ?></td>
				<td class="history_data"><?= $row["symbol"] ?></td>
				<td class="history_data"><?= $row["shares"] ?></td>
				<td class="history_data">$<?= number_format($row["price_per_share"], 2, '.', ',') ?></td>
				<td class="history_data" style="color: <?= $row["type"] == 'Purchase' ? 'red' : 'green' ?>;">$<?= number_format($row["total"], 2, '.', ',') ?></td>
			</tr>
			<?php endforeach ?>
		</table>
	<?php else: ?>
		<h1 style="opacity: 0.1; text-align: center; font-size: 420%; padding: 50px;">No transactions yet</h1>
	<?php endif ?>
</div>