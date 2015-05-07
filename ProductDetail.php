<?php
include 'base.php';
?>
<?php startblock('body') ?>

<?php
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
            <p class="detailToelichtingText">Wanneer de betaling binnen is wordt de foto tussen uw foto's geplaatst</p>
            <a href="Winkelmandje.php?id=<?php echo $product['Product_ID']?>&quantity=2"><button class="btn btn-success detailButton">In winkelmandje</button></a>
        </div>

        <div class="detailBeschrijvingContainer">
            <p class = "detailBeschrijvingTitle">Beschrijving</p>
            <hr  class="detailBeschrijvingUnderline"/>
            <p>Talogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.</p>
        </div>
    <?php } ?>

<?php endblock() ?>