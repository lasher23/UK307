<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <style type="text/css">
    	#button{
    		position: absolute;
    	}
    </style>
</head>
<body>
	<button id="button">Whack me!</button>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
<script>
    $(function() {
    	var buttonPressedCount = 0;
    	var delay = 1000;
        var $button=$('#button');
        var itsABoolean = false;
        var timeout;
        $button.on('click',function(){
        	buttonPressedCount++;
        	delay-=25;
        	console.log(buttonPressedCount)
        })
        $button.on('mouseenter', function(){
        	clearTimeout(timeout)
        	timeout = setTimeout(function(){
        	$randyTop = Math.random() *100+"%";
        	$randyLeft = Math.random() *100+"%";
        	$button.css('margin-top', $randyTop);
        	$button.css('margin-left', $randyLeft);
        	$button.disabled = false;
        	}
        	,delay);
        });
    });
</script>
</html>
