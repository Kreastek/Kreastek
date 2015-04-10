<?php
include 'base.php';
include 'Database.php';
?>
<?php startblock('body') ?>

<?php
    if(isset($_GET['id']) && trim($_GET['id']) != "")
    {
        $results = Database::getProduct(($_GET['id']));
        $product = $results[0];
        $zooi = Database::login("Aaron", "123456");
?>
        <?php echo $product['Titel'] ?></br>
        <?php echo $product['Omschrijving'] ?></br>
        &euro; <?php echo $product['Prijs'] ?></br>
        <div class='productOverzichtImg' style='background-image: url(<?php echo $product['Afbeelding'] ?>)'></div>
    <?php } ?>

<?php endblock() ?>