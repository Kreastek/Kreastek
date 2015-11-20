<?php
include 'base.php';
startblock('body');
?>
<?php
$results = Database::getProducten();
if ($results != null) {
    ?>
    <table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Titel</th>
        <th>Omschrijving</th>
        <th>Prijs</th>
        <th>Categorie</th>
        <th>Afbeelding</th>
        <th>Opties</th>
    </tr>
    </thead>
    <?php
    foreach ($results as $row) {
        $Categorie = Database::getCategorie($row['Categorie_ID']);
        ?>
        <tr>
            <td><?php echo $row['Product_ID'] ?></td>
            <td><?php echo $row['Titel'] ?></td>
            <td><?php echo $row['Omschrijving'] ?></td>
            <td><?php echo $row['Prijs'] ?></td>
            <td><?php echo $Categorie ?></td>
            <td><?php echo $row['Afbeelding'] ?></td>
            <td>
                <a href="Edit-product.php?id=<?php echo $row['Product_ID'] ?>" class="NoBlueA"><span
                        class="glyphicon glyphicon-pencil"></span></a>
                <a href="Delete-product.php?id=<?php echo $row['Product_ID'] ?>" class="NoBlueA"><span
                        class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>

        <?php
    }
    echo "</table>";
} else { ?>
    <p>Het verzoek naar de database heeft geen resultaten opgeleverd, of de verbinding met de database is offline.</p>
<?php } ?>

<?php endblock() ?>