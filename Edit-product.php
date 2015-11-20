<?php
include 'base.php';
startblock('body');
$id = intval($_GET['id']);
if (!empty($_POST)) {
    $result = Database::editProduct($id, $_POST["Titel"], $_POST["Omschrijving"], $_POST["Prijs"], $_POST["Categorie"], $_POST["imageUrl"]);

    if ($result != null) {
        echo "Het bewerken is geslaagd!";
    } else {
        echo "Het bewerken is mislukt, controlleer of u alle velden goed heeft ingevult.";
    }
} else {
    if (isset($id)) {
        $product = Database::getProduct($id)[0] ?>
        <form method="post">
            <input name="Titel" class="form-control" placeholder="Titel" value="<?php echo $product['Titel'] ?>">
            <input name="Omschrijving" class="form-control" placeholder="Omschrijving"
                   value="<?php echo $product['Omschrijving'] ?>">
            <input name="Prijs" type="number" class="form-control" placeholder="Prijs"
                   value="<?php echo $product['Prijs'] ?>">
            <select name="Categorie" class="form-control">
                <option value="" disabled>Categorie</option>
                <?php
                $result = Database::getCategorieen();
                foreach ($result as $row) {
                    echo "<option " . ($row['Categorie_ID'] == $product['Categorie_ID'] ? ("selected") : ("")) . " value=\"" . $row["Categorie_ID"] . "\">" . $row["Naam"] . "</option>";
                }
                ?>
            </select>
            <input name="imageUrl" class="form-control" placeholder="Afbeelding link*"
                   value="<?php echo $product['Afbeelding'] ?>">
            <button type="submit" class="btn btn-success">Product bewerken</button>
        </form>


    <?php }
}
endblock() ?>