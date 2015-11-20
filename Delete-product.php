<?php
include 'base.php';
startblock('body');
$id = intval($_GET['id']);
if (isset($id) && Database::deleteProduct($id) == true) {
    ?>
    Het product is succesvol verwijdert.

    <?php
} else {
    ?>
    Het product is niet verwijdert, er is iets misgegaan.
<?php }
endblock() ?>