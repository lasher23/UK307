<?php 

for ($beerCount=99; $beerCount >= 0 ; $beerCount--) { 
	$withSorWithout ="s";
	$withSorWithout2 ="s";
	if($beerCount<=1){
		$withSorWithout="";
	}
	if($beerCount<=2){
		$withSorWithout2 ="";
	}
	if($beerCount===0){
		echo "No more bottles of beer on the wall, no more bottles of beer.<br>Go to the store and buy some more, 99 bottles of beer on the wall.";
	}else{
		echo "$beerCount bottle$withSorWithout of beer on the wall, $beerCount bottle$withSorWithout of beer.<br> Take one down and pass it around, " . ($beerCount - 1) ." bottle$withSorWithout2 of beer on the wall.<br><br>";
	}
}