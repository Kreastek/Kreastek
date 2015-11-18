<?php
	include 'base.php';
	startblock('body'); ?>

	<form>
		<?php if(isset($_POST['zoekText']) && trim($_POST['zoekText']) != "")
		{
			echo '<input type="text" name="zoekText" value="' . $_POST['zoekText'] . '"';
			$result = Database::getKlanten($_POST['zoekText']);
		}
		else
		{
			echo '<input type="text" name="zoekText">';
			$result = Database::getKlanten();
		}?>

		<button type="submit">Zoeken</button>
	</form>

	<!--<table id="sortTable">-->
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>Voorletters</th>
				<th>Achternaam</th>
				<th>Adres</th>
				<th>Postcode</th>
				<th>Plaats</th>
				<th>Telefoon</th>
				<th/>
			</tr>
		</thead>
		<tbody>
	<?php
		while($rij = $result)
		{
			echo 'hallo';
		/*?>
			<tr>
				<td><?php echo $rij['Klant_ID'] ?> </td>
				<td><?php echo $rij['Email'] ?> </td>
				<td><?php echo $rij['Voorletters'] ?> </td>
				<td><?php echo $rij['Achternaam'] ?> </td>
				<td><?php echo $rij['Adres'] ?> </td>
				<td><?php echo $rij['Postcode'] ?> </td>
				<td><?php echo $rij['Plaats'] ?> </td>
				<td><?php echo $rij['Telefoon'] ?> </td>
				<td>
					<form action='editRecord.php?editID="<?php echo $rij['id']?>"' method='post'>
						<button type='submit' name='edit' value=' '>
							<img src='Icons/edit.png' height='18' width='18' />
						</button>
					</form>
					<form action='deleteRecord.php?deleteID="<?php $rij['id'] ?>"' method='post'>
						<button type='submit' name='delete' value=' '>
							<img src='Icons/delete.png' height='18' width='18' />
						</button>
					</form>
				</td>
			</tr>
	<?php */}?>
		</tbody>
	</table>

<?php endblock() ?>