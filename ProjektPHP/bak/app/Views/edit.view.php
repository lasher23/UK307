<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="public/js/validateNewForm.js"></script>
</head>
<body>
	<form action="validateEditView?id=<?php
	echo $id;
	?>" id="formular" method="post">
		<fieldset>
			<legend>Person</legend>
			<label for="name">Name</label><br> <input id="name" type="text"
				name="name"
				value="<?php
				if (isset ( $name )) {
					echo $name;
				}
				?>"> </input> <label id="errorName"><?php
				if (isset ( $errors )) {
					echo $errors ['name'];
				}
				?></label><br> <label for="email">E-Mail</label><br> <input
				id="email" type="text" name="email"
				value="<?php
				if (isset ( $email )) {
					echo $email;
				}
				?>"></input> <label id="errorEmail"><?php
				if (isset ( $errors )) {
					echo $errors ['email'];
				}
				?></label><br> <label for="phone">Telefon</label><br> <input
				id="phone" type="text" name="phone"
				value="<?php
				if (isset ( $phone )) {
					echo $phone;
				}
				?>"></input> <label id="errorPhone"><?php
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
						echo $risk ['id']?>"
					<?php
						if (isset ( $values )) {
							if ($risk ['id'] == $values ['riskID']) {
								echo "selected";
							}
						}
						?>><?php
						$a = $risk ['risk'];
						$b = $risk ['changeDays'];
						$c = $risk ['rentalPeriod'];
						echo "$a :  $b : $c";
						?></option>
					<?php
					endforeach
					?>
			</select> <label id="errorRisk"><?php
			if (isset ( $errors )) {
				echo $errors ['risk'];
			}
			?></label>
		</fieldset>

		<fieldset>
			<legend>Hypothek</legend>
			<select name="mortgages" id="mortgages">
				<?php
				foreach ( $mortgages as $mortgage ) :
					?>
				<option value="<?php
					echo $mortgage ['id']?>" 
					<?php
					if (isset ( $values )) {
						if ($mortgage ['id'] == $values ['mID'])
							echo "selected";
					}
					?>

					><?php
					echo $mortgage ['package']?></option>
				<?php
				endforeach
				?>
			</select> <label id="errorMortgages"><?php
			if (isset ( $errors )) {
				echo $errors ['hypo'];
			}
			?></label>
		</fieldset>
		<fieldset>
			<legend>Status</legend>
			<input type="radio" name="state" value="1" <?php
			if ($values ['paidState'] == 1) {
				echo "checked";
			}
			?>>Bezahlt</input>

			<input type="radio" name="state" value="0"<?php
			if ($values ['paidState'] == 0) {
				echo "checked";
			}
			?>>Nicht Bezahlt</input>
		</fieldset>
		<input type="submit" value="Erstelle" />

	</form>
</body>
</html>