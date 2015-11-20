<?php
include 'base.php';
startblock('body');
$id = intval($_GET['id']);
if (!empty($_POST)) {
    $result = Database::editCategorie($id, $_POST["Naam"]);

    if ($result != null) {
        echo "Het bewerken is geslaagd!";
    } else {
        echo "Het bewerken is mislukt, controlleer of u alle velden goed heeft ingevult.";
    }
} else {
    if (isset($id)) {
        $categorie = Database::getCategorie($id) ?>
        <form method="post">
            <input name="Naam" class="form-control" placeholder="Titel" value="<?php echo $categorie ?>">
            <button type="submit" class="btn btn-success">Categorie bewerken</button>
        </form>


    <?php }
}
endblock() ?>