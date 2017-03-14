$(function() {
	$('#formular').on('submit', function() {
		var errors = 0;
		removeError($('#name'));
		$('#errorName').html('');
		removeError($('#email'));
		$('#errorEmail').html('');
		removeError($('#phone'));
		$('#errorPhone').html('');
		
		if ($('#name').val() === '') {
			addError($('#name'));
			$('#errorName').html('Das Feld Name darf nicht leer sein!');
			errors++;
		}
		
		if($('#email').val() === ''){
			addError($('#email'));
			$('#errorEmail').html('Das Feld E-Mail darf nicht leer sein!');
			errors++;
		} else if(!(new RegExp(".{0,}(@).{0,}").test($('#email').val()))){
			addError($('#email'));
			$('#errorEmail').html('Das Feld E-Mail muss ein @ Zeichen enthalten');
			errors++;
		}
		
		if(!(new RegExp("^[0-9\\+\\-)(\\s]*$").test(($('#phone').val())))){
			addError($('#phone'));
			$('#errorPhone').html('Das Feld Telefon darf nur folgende Zeichen enthalten: +-()1234567890');
		}
		
		return false;
	});
});

function addError(inputBox) {
    inputBox.css("background-image", "url(public/imgs/error.png)");
    inputBox.css("background-repeat", "no-repeat");
    inputBox.css("background-position", "right");

}
function removeError(inputBox){
    inputBox.css("background-image", "");
}