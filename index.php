<?php
    include 'base.php';
?>

<?php startblock('body') ?>
<img class="header" src="Images/header.jpg"/>

<?php
$results = Database::getAanbiedingen();
if ($results != null) {
	foreach ($results as $row) { ?>
		<a class="NoBlueA" href="ProductDetail.php?id=<?php echo $row['Product_ID'] ?>">
			<div class='productOverzichtPositioner'>
				<div class='productOverzichtContainer'>
					<div class='productOverzichtImg'
						 style='background-image: url(<?php echo $row['Afbeelding'] ?>)'></div>
					<div class='productOverzichtTitle'>
						<p><?php echo $row['Titel'] ?></p>
					</div>
					<div class='productOverzichtPrijs'>
						<p class="oudePrijs">&euro; <?php echo $row['Prijs'] ?></p>
						<p class="nieuwePrijs">&euro; <?php echo $row['Prijs'] - (($row['Prijs'] / 100) * $row['AanbiedingPercentage']) ?></p>
					</div>
					<div class='productOverzichtBeschrijving'>
						<p><?php echo $row['Omschrijving'] ?></p>
					</div>
				</div>
				<div style='clear:both'></div>
			</div>
		</a>
	<?php
	}
} else { ?>
	<p>Het verzoek naar de database heeft geen resultaten opgeleverd, of de verbinding met de database is offline.</p>
<?php } ?>

<?php endblock() ?>
