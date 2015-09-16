<head>
	<?php include 'base.php'; ?>
</head>

<?php startblock('body') ?>

<body>
	<form>
		<table>
			<tr><td><input type="text" name="Gebruikersnaam" /></td></tr>
			<tr><td><input type="text" name="Wachtwoord" /></td></tr>
			<tr><td><input type="text" name="WachtwoordOpnieuw" /></td></tr>
			<tr><td><input type="text" name="Voorletters" /></td></tr>
			<tr><td><input type="text" name="Achternaam" /></td></tr>
			<tr><td><input type="text" name="Adres" /></td></tr>
			<tr><td><input type="text" name="Postcode" /></td></tr>
			<tr><td><input type="text" name="Plaats" /></td></tr>
			<tr><td><input type="text" name="Telefoon" /></td></tr>
			<tr><td><input type="text" name="Email" /></td></tr>
			<tr><td><button class="btn btn-success">Versturen</button></td></tr>
		</table>
	</form>
</body>


<a data-toggle="modal" data-target="#myModal">Click me !</a>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>

			</div>
			<div class="modal-body">
				<p>Ik heb een popupje</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
