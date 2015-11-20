<?php
include 'base.php';
startblock('body');
$id = intval($_GET['id']);
$result = Database::deleteCategorie($id);
if (isset($id) && $result == true) {
    ?>
    De categorie is succesvol verwijdert.

    <?php
} elseif ($result == false) {
    ?>
    De categorie is niet verwijdert, er is iets misgegaan.
<?php } elseif ($result == 2) {
    echo "Deze categorie heeft nog producten, u moet eerst de producten verwijderen.";
}
endblock() ?>