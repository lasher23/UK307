<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
</head>
<body>
    <h1>Tasks</h1>
    <form action="insert" method="POST">
    	<label for="title">Titel</label>
   		<input type="text" name="title" id="title">

   		<input type="submit" value="Eintragen">
    </form>
   	<ul>
   		<?php foreach($result as $element):?>
   			<li><?= $element['title'] ?></li>
   		<?php endforeach; ?>   		
   	</ul>
</body>
</html>
