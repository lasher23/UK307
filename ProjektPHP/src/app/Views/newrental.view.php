<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="public/js/validateNewForm.js"></script> -->
</head>
<body>
	<form action="validateNew" id="formular" method="post">
		<fieldset>
			<legend>Person</legend>
			<label for="name">Name</label><br> 
			<input id="name" type="text" name="name"></input><label id="errorName"><?php
			if (isset ( $errors )) {
				echo $errors ['name'];
			}
			?></label><br>
			<label for="email">E-Mail</label><br> <input id="email" type="text" name="email"></input><label id="errorEmail"><?php
			if (isset ( $errors )) {
				echo $errors ['email'];
			}
			?></label><br>
			<label for="phone">Telefon</label><br> <input id="phone" type="text" name="phone"></input><label id="errorPhone"><?php
			if (isset ( $errors )) {
				echo $errors ['phone'];
			}
			?></label><br>
		</fieldset>

		<fieldset>
			<legend>Risiko</legend>
			<select id="risk" name="risk">
					<?php
					foreach ( $risks as $risk ) :
						?>
					<option value="<?php
						echo $risk ['id']?>"><?php
						$a = $risk ['risk'];
						$b = $risk ['changeDays'];
						$c = $risk ['rentalPeriod'];
						echo "$a :  $b : $c";
						?></option>
					<?php
					endforeach
					?>
			</select>
		</fieldset>

		<fieldset>
			<legend>Hypothek</legend>
			<select name="mortgages" id="mortgages">
				<?php
				foreach ( $mortgages as $mortgage ) :
					?>
				<option value="<?php
					echo $mortgage ['id']?>"><?php
					echo $mortgage ['package']?></option>
				<?php
				endforeach
				?>
			</select>
		</fieldset>
		<input type="submit" value="Erstelle"/>

	</form>
</body>
</html>