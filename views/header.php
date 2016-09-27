<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <div>
                    <a href="/"><img alt="C$50 Finance" src="/img/logo.png"/></a>
                </div>
                <?php if (!empty($_SESSION["id"])): ?>
	                <table style="width: 100%;">
	                    <tr>
	                		<td><h3 style="align: left;">Hello, <span style="font-weight: bold;"><?= CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"])[0]["full_name"] ?></span></h3></td>
					        <td>
			                    <ul class="nav nav-pills">
			                        <li><a href="quote.php">Quote</a></li>
			                        <li><a href="buy.php">Buy</a></li>
			                        <li><a href="sell.php">Sell</a></li>
			                        <li><a href="history.php">History</a></li>
			                        <li><a href="deposite.php">Deposite</a></li>
			                        <li><a href="settings.php">Settings</a></li>
			                        <li><a href="logout.php"><strong>Log Out</strong></a></li>
			                    </ul>
					        </td>
					        <td><table style="width: auto; align: right;">
				                <tr>
					                <td id="balance">Balance:</td>
					                <td id="cash">$<?= number_format(CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"])[0]["cash"], 2, '.', ',') ?></td>
					            </tr>
					        </table></td>
						</tr>
					</table>
			    <?php endif ?>
            </div>

            <div id="middle">
