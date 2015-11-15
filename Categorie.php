<?php
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 3-7-2015
 * Time: 15:26
 */
include 'base.php';
startblock('body');
$id = intval($_GET['id']);
if(isset($id)) {
    $results = Database::getCategorie($id);
    $categorie = $results[0];
    $results = Database::getProductenFromCategorie($id);
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
            <?php
        }
    }
} else { ?>
    <p>Het verzoek naar de database heeft geen resultaten opgeleverd, of de verbinding met de database is offline.</p>
<?php } ?>
<?php endblock() ?>