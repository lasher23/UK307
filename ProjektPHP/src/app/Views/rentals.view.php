<!DOCTYPE html>
<html>
<head>
<!--<script src="https://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="app/Controllers/validate.js"></script>-->
<link rel="stylesheet" href="public/css/app.css">
<meta charset="utf-8">
</head>
<body>
	<table id="table">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>E-Mail</th>
			<th>Telefon</th>
			<th>Hypo-Paket</th>
		</tr>
		<?php
		foreach ( $rentalsUnpaid as $rentals ) :
			?>
		<tr>
			<td><?php
			echo $rentals ['rentalsID']?></td>
			<td><?php
			echo $rentals ['name']?></td>

			<td><?php
			echo $rentals ['email']?></td>
			<td><?php
			echo $rentals ['phone']?></td>
			<td><?php
			echo $rentals ['package']?></select></td>
			<!-- <td><input type="radio" <?php
			
			if ($rentals ['paidState'] == 1) {
				echo 'checked';
			}
			?> disabled/></td> -->
			<td><img src="public/imgs/<?php
			$time = strtotime ( $rentals ['createDT'] );
			$time = $time + ( int ) $rentals ['rentalPeriod'] * 24 * 60 * 60;
			if ($time > time ()) {
				echo "hypoInRentalValid.png";
			} else {
				echo "hypoInRentalUnvalid.png";
			}
			?>" width="20" height="20"></td>
			<td><a href="validateEdit<?php
			echo '?id=' . $rentals ['rentalsID']?>">Change</a></td>
		</tr>
		<?php
		endforeach
		?>
	</table>
</body>
<html>