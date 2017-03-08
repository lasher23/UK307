<?php
class cooleClass{
	public function sterb($parameter){
		foreach ($parameter as $key) {
			$Oldtimer = "";
			if($key[1]<1990){
				$Oldtimer = "einen Oldtimer";
			}else {
				$Oldtimer = "keinen Oldtimer";
			}
			print "Beim $key[0] handelt es sich um $Oldtimer<br>";
		}
	}
}
$vehicle = ["Auto","Velo","Bus"];

$car = [
	["Audi",2000],
	["Bentley",1944]
];
require "index.view.php";