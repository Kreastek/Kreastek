<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"> <!--<![endif]-->
<head>
    <?php require_once 'ti.php';
    startblock('css') ?>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <?php endblock() ?>
    <?php startblock('scripts') ?>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <?php endblock() ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php startblock('title') ?>
    <title>Title</title>
    <?php endblock() ?>
    <meta name="Kreastek" content="Hobby store">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Kreastek</a>
        </div>
        <div class="navbar-collapse collapse">
        </div>
        <!--/.navbar-collapse -->
    </div>
</div>
<div class="container">
    <?php startblock('body') ?>
        This is the body, if you opened the block body you would not see this message.
        <br />
        Please fix it.
    <?php endblock() ?>
    <footer>
        <p>&copy; Kreastek <?php echo date("Y") ?></p>
    </footer>
</div>
</body>
</html>