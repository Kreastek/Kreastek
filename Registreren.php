<?php
include 'base.php';
startblock('body');
if (!empty($_POST)) {
    Database::addGebruiker($_POST["Email"], $_POST["Wachtwoord"], $_POST["Achternaam"], $_POST["Voorletters"], $_POST["Adres"], $_POST["Postcode"], $_POST["Plaats"], $_POST["Telefoon"]);
} ?>
    <form method="post">
        <input name="Email" placeholder="Email adres" class="form-control">
        <input type="password" name="Wachtwoord" placeholder="Wachtwoord" class="form-control">
        <input name="Achternaam" placeholder="Achternaam" class="form-control">
        <input name="Voorletters" placeholder="Voorletters" class="form-control">
        <input name="Adres" placeholder="Adres" class="form-control">
        <input name="Postcode" placeholder="Poscode" class="form-control">
        <input name="Plaats" placeholder="Plaats" class="form-control">
        <input name="Telefoon" placeholder="Telefoon" class="form-control">
        <button class="form-control btn" type="submit">Registreren</button>
    </form>
<?php endblock() ?>