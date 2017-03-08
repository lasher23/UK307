<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
</head>
<body>
    <?php

    	for($i = 0; $i<count($clowns);$i++){
    		echo "<li>$clowns[$i]<br></li>";
    	}
    ?>
</body>
</html>