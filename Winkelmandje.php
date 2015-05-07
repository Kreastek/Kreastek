<?php
include 'base.php';
?>
<?php startblock('body') ?>

<?php
    //Als deze meuk gezet is betekent het dat er een nieuw product aan het winkelmandje toegevoegd wordt (of mee van een bestaande)
    if(isset($_GET['id']) &&
        trim($_GET['id']) != "" &&
        isset($_GET['quantity']) &&
        trim($_GET['quantity']) != "")
    {
        //Als producten niet bestaat dan maken
        if(!isset($_SESSION['producten']))
        {
            $_SESSION['producten'] = array();
        }

        //ALs product al voorkomt quantity optellen, anders nieuwe regel in array maken.
        if(array_key_exists($_GET['id'], $_SESSION['producten']))
        {
            $_SESSION['producten'][$_GET['id']] += $_GET['quantity'];
        }
        else
        {
            $_SESSION['producten'][$_GET['id']] = $_GET['quantity'];
        }
    }

    if(isset($_SESSION['producten']))
    { ?>
        <table>
            <?php foreach($_SESSION['producten'] as $key => $item)
            {
                print "<tr><td>Product id: " . $key . " </td><td>Aantal: " . $item . "</td></tr>";
            } ?>
        </table>
    <?php
    } ?>

<?php endblock() ?>