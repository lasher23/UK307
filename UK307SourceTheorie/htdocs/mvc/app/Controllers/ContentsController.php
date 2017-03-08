<?php
$input =$_GET['content']??'';
if($input!==''){
	$myfile = file_get_contents("public/contents/".$input.".txt");
}
require 'app/Views/contents.view.php';