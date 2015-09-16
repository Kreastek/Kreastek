<head>
	<?php include 'base.php'; ?>
</head>

<?php startblock('body') ?>

<?php
    //Als deze meuk gezet is betekent het dat er een nieuw product aan het winkelmandje toegevoegd wordt (of mee van een bestaande)
    if(isset($_GET['id']) &&
        trim($_GET['id']) != "" &&
        isset($_GET['quantity']) &&
        trim($_GET['quantity']) != "")
    {
        //Als producten niet bestaat dan maken
        if(!isset($_SESSION['producten']))
        {
            $_SESSION['producten'] = array();
        }

        //Als product al voorkomt quantity optellen, anders nieuwe regel in array maken.
        if(array_key_exists($_GET['id'], $_SESSION['producten']))
        {
            $_SESSION['producten'][$_GET['id']] += $_GET['quantity'];
        }
        else
        {
            $_SESSION['producten'][$_GET['id']] = $_GET['quantity'];
        }
    }

	if(isset($_GET['id']) &&
		trim($_GET['id']) != "" &&
		isset($_GET['remove']) &&
		$_GET['remove'] == true &&
		isset($_SESSION['producten']))
	{
		unset($_SESSION['producten'][$_GET['id']]);
	}

    if(isset($_SESSION['producten']) && !empty($_SESSION['producten']))
    {
		$productDetails = array();
		$totaalPrijs = 0; ?>

		<table class='wmTable'>
			<tr>
				<th class="wmTh"></th>
				<th class="wmTh">Titel</th>
				<th class="wmTh">Aantal</th>
				<th class="wmTh">Status</th>
				<th class="wmTh wmPrijs">Prijs</th>
			</tr>

		<?php
		foreach($_SESSION['producten'] as $key => $item)
		{
			$results = Database::getProduct($key);
			$product = $results[0];

			if($product != null)
			{
				$AantalPrijs = $product['Prijs'] * $item;
				$totaalPrijs += $AantalPrijs; ?>

				<tr>
					<td><img class="wmImg" src="<?php echo $product['Afbeelding'] ?>"></td>
					<td class="wmTd"><?php echo $product['Titel'] . "<br/>&euro;" . $product['Prijs'];?></td>
					<td class="wmTd"><?php echo $item;?></td>
					<td class="wmTd wmTdStatus">Op voorraad</td>
					<td class="wmTd wmPrijs"><?php echo "&euro;" . $AantalPrijs;?></td>
					<td class="wmTdRemove"><a href="Winkelmandje.php?id=<?php echo $key?>&remove=true"><span class="glyphicon glyphicon-remove deleteX"></span></a></td>
				</tr>
			<?php }
		} ?>

			<tr class="wmTrTotaal">
				<td colspan="5" class="wmTd wmPrijs">Totaal: <?php echo "&euro;" . $totaalPrijs;?></td>
			</tr>
			<tr>
				<td colspan="5" class="wmTd wmPrijs afrekenKnop">
					<a href="Winkelmandje.php">
						<button class="btn btn-success">Afrekenen</button>
					</a>
				</td>
			</tr>
		</table>
    <?php }
	else
	{
		echo "<p>Er bevinden zich geen producten in uw winkelmandje.</p>";
	}
?>

<?php endblock() ?>