<?php
include 'base.php';
?>
<?php startblock('body') ?>

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

        <img class="detailFotoImg" src="<?php echo $product['Afbeelding'] ?>">

        <div class="detailRightContainer">
            <div class="detailFotoPrijs"><p>&euro;<?php echo $product['Prijs']?>,-</p></div>
            <p class="detailToelichtingText">Betalingen worden afgehandeld via iDeal of PayPal.</p>
            <p class="detailToelichtingText">Wanneer de betaling binnen is wordt het product verzonden.</p>
			<!--Product in winkelmandje-->
            <a href="Winkelmandje.php?id=<?php echo $product['Product_ID']?>&quantity=1">
				<button class="btn btn-success detailButton">In winkelmandje</button>
			</a>
        </div>


        <hr>
        <div class="section_wrapper">
            <a id="Beschrijving" class="btn btn-default">Beschrijving</a>
            <a id="Reviews"class="btn btn-default">Reviews</a>


            <div id="beschrijving" class="hide">
            <div class="detailBeschrijvingContainer">
                <p class = "detailBeschrijvingTitle">Beschrijving</p>
                <hr  class="detailBeschrijvingUnderline"/>
                <p><?php echo $product['Omschrijving']?></p>
            </div>
            </div>

            <div id="reviews" class="hide">
                    <h3>Reviews</h3>
                    <hr  class="detailBeschrijvingUnderline"/>
                <form class="form-horizontal" action="ProductDetail.php" method="post">
                    <div class="form-group">
                        <label for="sm_star" class="col-sm-2 control-label">Aantal sterren:</label>
                        <div class="col-sm-10">
                            <input id="sm_star" name="sm_star" type="number" class="rating" min=0 max=5 step=0.5 data-size="sm">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="titelReview" class="col-sm-2 control-label">Titel:</label>
                        <div class="col-sm-10">
                            <input id="titelReview" placeholder="titel" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <textarea id="recensie" rows="5" placeholder="Uw recensie" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Recensie plaatsen</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    <?php
	}
	else
	{
		echo "<p>Er is geen product geselecteerd.</p>";
	}?>
<?php endblock() ?>