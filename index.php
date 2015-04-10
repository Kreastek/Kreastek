<?php
    include 'base.php';
    include 'Database.php';
?>


<?php startblock('body') ?>
    <?php
    $results = Database::getProducten();
    if(Database::login("Aaron", 123456))
    {

    }

    foreach($results as $row)
    { ?>
        <div class='productOverzichtPositioner'>
            <div class='productOverzichtContainer'>
            <div class='productOverzichtImg' style='background-image: url(<?php echo $row['Afbeelding'] ?>)'></div>
                <div class='productOverzichtTitle'>
                    <p><?php echo $row['Titel'] ?></p>
                </div>
                <div class='productOverzichtPrijs'>
                    <p>&euro; <?php echo $row['Prijs'] ?></p>
                </div>
                <div class='productOverzichtBeschrijving'>
                    <div style='clear:both'></div>
                    <p><?php echo $row['Omschrijving'] ?></p>
                </div>
                <div style='clear:both'></div>
            </div>
        </div>
    <?php } ?>
<?php endblock() ?>

