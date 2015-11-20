<?php
include 'base.php';
startblock('body');

if (!empty($_POST)) {
    $result = Database::addProduct($_POST["Titel"], $_POST["Omschrijving"], $_POST["Prijs"], $_POST["Categorie"], $_POST["imageUrl"]);
    if ($result != null) {
        ?>
        Het product is toegevoegd!
        <?php
    } else {
        ?>
        Het opslaan van het product is niet geslaagd, heeft u alle velden correct ingevuld?
        <?php
    }
} else {
    ?>
    <form method="post">
        <input name="Titel" class="form-control" placeholder="Titel">
        <input name="Omschrijving" class="form-control" placeholder="Omschrijving">
        <input name="Prijs" type="number" class="form-control" placeholder="Prijs">
        <select name="Categorie" class="form-control">
            <option value="" disabled>Categorie</option>
            <?php
            $result = Database::getCategorieen();
            foreach ($result as $row) {
                echo "<option value=\"" . $row["Categorie_ID"] . "\">" . $row["Naam"] . "</option>";
            }
            ?>
        </select>
        <input name="imageUrl" class="form-control" placeholder="Image link*">
        <button type="submit" class="btn btn-success">Product maken</button>
    </form>
    *Vul hier /images/(uw gekozen bestandsnaam) in van het bestand dat u op de ftp server heeft gezet

<?php }
endblock() ?>