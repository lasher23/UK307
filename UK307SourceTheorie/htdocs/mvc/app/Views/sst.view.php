<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <button type="button" onclick="reload()">Again</button>
</body>
<script>
	var moves =['scherre','stein','papier'];
	var movePlayer = window.prompt("Wähle Scherre, Stein oder Papier");
	movePlayer.toLowerCase();
	movePlayer.trim();
	if(moves.indexOf(movePlayer)===-1){
		alert('Der eingegebene Spielzug ist nicht erlaubt!');
		throw new Error('Unerlaubter Spielzug');
	}
	alert('Du hast '+movePlayer+' eingegeben.')
	var random = Math.floor(Math.random() * (3));
	alert('Der Computer spielt Spielzug '+moves[random]+'.');

	alert('Das Endergebnis lautet: '+result(movePlayer, moves[random]));

	function result(movePlayer, movePc){
		if(movePlayer == movePc){
			return "Unentschieden";
		}else if(movePlayer=='stein'){
			if(movePc=='papier'){
				return 'PC gewinnt';
			}
			return 'Sie haben gewonnen';
			
		}else if(movePlayer=='scherre'){
			if(movePc=='papier'){
				return 'Sie haben gewonnen';
			}
			return 'PC hat gewonnen';
			
		}else if(movePlayer=='papier'){
			if(movePc=='stein'){
				return 'Sie haben gewonnen';
			}
			return 'PC hat gewonnen';
			
		}
	}
	function reload(){
		location.reload();
	}
</script>
</html>