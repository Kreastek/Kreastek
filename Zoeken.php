<?php
include 'base.php';
startblock('body');
if (empty($_POST)) {
    echo "Er is iets verkeerd gegaan, keer terug.";
} else {
    $results = Database::getProductenFromSearchTerm($_POST["search"]);
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
                            <p>&euro; <?php echo $row['Prijs'] ?></p>
                        </div>
                        <div class='productOverzichtBeschrijving'>
                            <p><?php echo $row['Omschrijving'] ?></p>
                        </div>
                    </div>
                    <div style='clear:both'></div>
                </div>
            </a>


        <?php }
    }
}
endblock() ?>
