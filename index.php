<?php
    include 'base.php';
    include 'Database.php';
?>



<?php startblock('body') ?>
    <?php
    $results = Database::getProducten();

    foreach($results as $row)
    {
        echo $row['Product_ID'] . "<br/>" . $row['Titel'] . "<br/>" . $row['Omschrijving'] . "<br/><br/>";
    }

    ?>
<?php endblock() ?>

