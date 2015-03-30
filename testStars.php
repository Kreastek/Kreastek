<?php
include 'base.php';
?>
    <link href="css/star-rating.min.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="js/star-rating.min.js" type="text/javascript"></script>
<?php startblock('body') ?>
    <form>
        <input id="input-id" type="number" class="rating" min=0 max=5 step=0.5 data-size="md">
    </form>
<?php endblock() ?>