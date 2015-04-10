<?php
include 'base.php';
?>
    <link href="css/star-rating.min.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="js/star-rating.min.js" type="text/javascript"></script>
<?php startblock('body') ?>
    <form method="post">
        <input id="sm_star" name="sm_star" type="number" class="rating" min=0 max=5 step=0.5 data-size="sm">
        <input id="md_star" name="md_star" type="number" class="rating" min=0 max=5 step=0.5 data-size="md">
        <input id="lg_star" name="lg_star" type="number" class="rating" min=0 max=5 step=0.5 data-size="lg">
        <button type="submit">fuk u</button>
    </form>
<?php

echo $_POST['sm_star'];
?>
<?php endblock() ?>