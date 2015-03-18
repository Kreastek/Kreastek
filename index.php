<?php
    include 'base.php';
    include 'Database.php';
?>



<?php startblock('body') ?>
    <?php
    $results = Database::getProducten();

    foreach($results as $row)
    {
        echo $row['Klant_ID'] . " " . $row['Achternaam'] . "<br/>";
        echo $row['Product_ID'] . "<br/>" . $row['Titel'] . "<br/>" . $row['Omschrijving'] . "<br/><br/>";
    }

    ?>
<?php endblock() ?>

