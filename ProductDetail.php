<?php
	include 'base.php';
	startblock('body');
?>

<?php
	//Kijken of er een product gezet is
    if(isset($_GET['id']) && trim($_GET['id']) != "")
    {
        $results = Database::getProduct(($_GET['id']));
        $product = $results[0];
?>
        <div class="detailFotoTitle">
            <p><?php echo $product['Titel']?></p>
        </div>

		<?php
		$afbeeldingen = Database::getAfbeeldingenBijProduct($product['Product_ID']);

		if ($afbeeldingen != null) { ?>
			<div class="detailImgContainer">
				<img id="zoom_01" class="detailFotoImg" src="<?php echo $afbeeldingen[0] ?>" data-zoom-image="<?php echo $afbeeldingen[0] ?>"/>

				<?php foreach ($afbeeldingen as $row) { ?>
					<img class="detailTumbnail" src="<?php echo $row ?>" />
				<?php }?>
			</div>
		<?php } ?>

        <div class="detailRightContainer">
            <div class="detailFotoPrijs"><p>&euro;<?php echo $product['Prijs']?>,-</p></div>
            <p class="detailToelichtingText">Betalingen worden afgehandeld via iDeal of PayPal.</p>
            <p class="detailToelichtingText">Wanneer de betaling binnen is wordt het product verzonden.</p>
			<!--Product in winkelmandje-->
			<input id="productID" type="hidden" value="<?php echo $product['Product_ID']?>">
			<div class="quantityInput">Aantal: <input id="quantity" type="number" value="1"><br/></div>
			<button class="btn btn-success detailButton">In winkelmandje</button>
        </div>

        <hr>
        <div class="section_wrapper">
            <div id="beschrijving">
				<div class="detailBeschrijvingContainer">
					<p class = "detailBeschrijvingTitle">Beschrijving</p>
					<hr  class="detailBeschrijvingUnderline"/>
					<p><?php echo $product['Omschrijving']?></p>
				</div>
            </div>
        </div>

    <?php
	}
	else
	{
		echo "<p>Er is geen product geselecteerd.</p>";
	}?>

<script src="js/jquery.elevateZoom-3.0.8.min.js"></script>
<script>
	$("#zoom_01").elevateZoom();

	$(".detailTumbnail").click(function (){
		$(".detailFotoImg").attr("src", $(this).attr("src"));
		$(".detailFotoImg").data("zoom-image", $(this).attr("src"));
		$("#zoom_01").elevateZoom();
	});

	$(".detailButton").click(function(){
		window.location = "../NewKreastek/Winkelmandje.php?id=" + $("#productID").val() + "&quantity=" + $("#quantity").val();
	});
</script>
<?php endblock() ?>

