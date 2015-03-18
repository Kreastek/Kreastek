<?php
    include 'base.php';
    include 'Database.php';
?>



<?php startblock('body') ?>
    <?php
    $results = Database::getProducten();

    foreach($results as $row)
    {
        echo "<div class='productOverzichtPositioner'>
                <div class='productOverzichtContainer'>
                    <div class='productOverzichtTitle'>
                        <p>" . $row['Titel'] . "</p>
                    </div>
                    <div class='productOverzichtPrijs'>
                        <p>&euro;" . $row['Prijs'] . "</p>
                    </div>
                    <div class='productOverzichtBeschrijving'>
                        <div style='clear:both'></div>
                        <p>Talogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.</p>
                        <div style='clear:both'></div>
                    </div>
                </div>
            </div>";
    }

    ?>
<?php endblock() ?>

