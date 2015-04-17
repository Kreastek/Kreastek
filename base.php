<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"> <!--<![endif]-->
<head>
    <?php require_once 'ti.php';
    include 'Database.php';
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
<div class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-inner"
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarmain">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Kreastek</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarmain">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li>
                    <a href="TestStuff.php">Producten</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Categoriën
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">

                        <li><a>Home</a></li>
                        <li><a>Something</a></li>
                        <li><a>More</a></li>
                        <li class="divider"></li>
                        <li><a>Even more</a></li>
                        <li><a>Wow more</a></li>
                    </ul>
                </li>
            </ul>
                <div class="navbar-right">
                    <ul class="nav navbar-nav"><li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Login <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                            <form action="validate-login.php" method="post">
                                <div class="col-sm-12">
                                    <div class="col-sm-12">
                                        Login
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Gebruikersnaam" class="form-control input-sm" id="username" name="username"/>
                                    </div>
                                    <br/>
                                    <div class="col-sm-12">
                                        <input type="password" placeholder="Wachtwoord" class="form-control input-sm" name="password" id="password" />
                                    </div>
                                    <div class="col-sm-12">
                                        <button formaction="validate-login.php" type="submit" class="btn btn-success btn-sm">Sign in</button>
                                    </div>
                                </div>
                            </form>
                            </li>
                        </ul>
                    </ul>
                </div>
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
<script>
    $(function () {
        $('.dropdown-menu input').click(function (event) {
            event.stopPropagation();
        });

    var url = window.location;
    // Will only work if string in href matches with location
    $('ul.nav a[href="' + url + '"]').parent().addClass('active');
    // Will also work for relative and absolute hrefs
    $('ul.nav a').filter(function () {
        return this.href == url;
    }).parent().addClass('active')
        .parent().parent().addClass('active');
    });
</script>