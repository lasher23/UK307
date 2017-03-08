<?php
for ($i=0; $i < count($input); $i++) { 
	if(strpos(strtolower($input[$i]), "spam") !== false||strpos(strtolower($input[$i]), "singles") !== false){
		echo "Satz $i ist SPAM<br>";
	}else{
		echo "Satz $i ist OK<br>";
	}
}