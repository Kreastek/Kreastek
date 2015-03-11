<?php
    include 'base.php';
    include 'Database.php';
?>

<?php startblock('featured-title') ?>
    <h1>Kreastek</h1>
<?php endblock() ?>


<?php startblock('body') ?>
    <?php

        $results = Database::getKlanten();

        foreach($results as $row)
        {
            echo $row['ID'] . " " . $row['Naam'] . "<br/>";
        }

    ?>
<?php endblock() ?>

