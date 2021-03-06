<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"> <!--<![endif]-->
<head>
    <?php require_once 'ti.php';
    include 'Database.php';
    session_start();
    startblock('css') ?>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/star-rating.min.css" media="all" rel="stylesheet" type="text/css"/>
    <?php endblock() ?>
    <?php startblock('scripts') ?>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/star-rating.min.js" type="text/javascript"></script>
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
	<div id="menubalk">
		<div class="navbar-inner">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarmain">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php"><div class="navbar-brand"></div></a>
			</div>
		</div>
		<!--Menu items-->
		<div class="collapse navbar-collapse" id="navbarmain">
			<ul class="nav navbar-nav">
				<li><a class="navbar-font" href="index.php">Home</a></li>
				<!--Categorieen dropdown-->
				<li class="dropdown">
					<a href="#" id="catDropdown" class="dropdown-toggle navbar-font" data-toggle="dropdown" role="button" aria-expanded="false">Producten<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<?php $results = Database::getCategorieen();
						foreach ($results as $row) {
							?>
							<li><?php echo '<a href="Categorie.php?id=' .$row["Categorie_ID"]. '">'  .$row['Naam'] ?></a></li>
						<?php } ?>
					</ul>
				</li>
				<li><a class="navbar-font" href="winkelmandje.php">Winkelmandje</a></li>
				<?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 2)
				{?>
					<li><a class="navbar-font" href="cms.php">Klanten CMS</a></li>
				<?php }?>
			</ul>
			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li>
						<form id="searchForm" method="post" action="Zoeken.php">
							<input class="form-control" name="search" id="search" placeholder="Zoeken" type="search">
						</form>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle navbar-font" data-toggle="dropdown" role="button" aria-expanded="false">
							<?php
							if (isset($_SESSION['email']))
							{
								echo $_SESSION['email'] . '<span class="caret"></span>';
							}
							else
							{ ?>
								Login <span class="caret"/>
							<?php } ?>
						</a>
						<ul class="dropdown-menu" role="menu">
							<?php
							if(isset($_SESSION['email']))
							{ ?>
								<!--Geef uilog knop-->
								<li>
									<form action="logout.php" method="post">
										<div class="col-sm-12">
											<div class="col-sm-12">
												<button type="submit" class="btn btn-success btn-sm">Log out</button>
											</div>
										</div>
									</form>
								</li>
							<?php }
							else
							{ ?>
								<!--Geef inlogvelden-->
								<li>
									<form action="validate-login.php" method="post">
										<div class="col-sm-12 login-dropdown">
											<div class="col-sm-12">
												Login
											</div>
											<div class="col-sm-12">
												<input type="text" placeholder="Gebruikersnaam" class="form-control input-sm" id="email" name="email"/>
											</div>
											<br/>
											<div class="col-sm-12">
												<input type="password" placeholder="Wachtwoord" class="form-control input-sm" name="password" id="password" />
											</div>
											<div class="col-sm-12">
												<button type="submit" class="btn btn-success btn-sm">Sign in</button>
											</div>
											<div class="col-sm-12">
                                            	<a href="Registreren.php">Registreren</a>
											</div>
										</div>
									</form>
								</li>
							<?php }
							?>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">
    <?php startblock('body') ?>
    This is the body, if you opened the block body you would not see this message.
    <br/>
    Please fix it.
    <?php endblock() ?>
    <footer>
        <p>&copy; Kreastek <?php echo date("Y") ?></p>
    </footer>
</div>
</body>
</html>
<script>
	var url = window.location;
	// Will only work if string in href matches with location
	$('ul.nav a[href="' + url + '"]').parent().addClass('active');
	// Will also work for relative and absolute hrefs
	$('ul.nav a').filter(function () {
		return this.href == url;
	}).parent().addClass('active')
		.parent().parent().addClass('active');

	$("#catDropdown").click(function(){
		window.location = "../NewKreastek/Categorie.php";
	});
</script>