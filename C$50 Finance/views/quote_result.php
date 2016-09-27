<div>
	<table align="center">
		<tr>
			<td class="table_header">Name: </td>
			<td class="quote"><?= $company["name"] ?></td>
		</tr>
		<tr>
			<td class="table_header">Symbol: </td>
			<td class="quote"><?= $company["symbol"] ?></td>
		</tr>
		<tr>
			<td class="table_header">Price: </td>
			<td class="quote">$<?= number_format($company["price"], 2, '.', ',') ?></td>
		</tr>
	</table>
</div>