<?php
include 'base.php';
startblock('body');
if (!empty($_POST)) {
    if (Database::addCategorie($_POST["naam"]) != null) {
        echo "De categorie is succesvol toegevoegd.";
    } else {
        echo "De categorie is niet opgeslagen, controlleer of u geen vreemde tekens heeft ingevuld.";
    }
}
?>
<?php
$results = Database::getCategorieen();
if ($results != null) {
    ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
        </tr>
        </thead>
        <?php
        foreach ($results as $row) {
            $Categorie = Database::getCategorie($row['Categorie_ID']);
            ?>
            <tr>
                <td><?php echo $row['Categorie_ID'] ?></td>
                <td><?php echo $row['Naam'] ?></td>
                <td>
                    <a href="Edit-categorie.php?id=<?php echo $row['Categorie_ID'] ?>" class="NoBlueA"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                    <a href="Delete-categorie.php?id=<?php echo $row['Categorie_ID'] ?>" class="NoBlueA"><span
                            class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>

            <?php
        }
        ?>
    </table>
    <form method="post">
        Voeg een categorie toe:
        <input name="naam" class="form-control" placeholder="Categorie naam">
        <button type="submit" class="form-control btn btn-success">Categorie toevoegen</button>
    </form>
    <?php
} else { ?>
    <p>Het verzoek naar de database heeft geen resultaten opgeleverd, of de verbinding met de database is offline.</p>
<?php } ?>

<?php endblock() ?>