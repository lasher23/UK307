$(function() {
    $('#formular').on('submit', function() {
        var errors = [];
        $("input").each(function() {
            var name = $(this).attr("name");
            $(this).css("background-image", "");
            switch (name) {
                case "name":
                    if ($(this).val() == "") {
                        addErrorImg($(this));
                        var errorMsg = "Die Tabellenspalte Name, darf nicht leer sein.";
                        if (errors.indexOf(errorMsg) == -1) {
                            errors.push(errorMsg);
                        }
                    }
                    break;
                case "email":
                	console.log("blurb")
                    if ($(this).val() == "") {
                        addErrorImg($(this));
                        var errorMsg = "Die Tabellenspalte E-Mail, darf keine lerre Einträge enthalten.";
                        if (errors.indexOf(errorMsg) == -1) {
                            errors.push(errorMsg);
                        }
                        addErrorImg($(this));
                    }else if(!(new RegExp(".{0,}(@).{0,}").test($(this).val()))){
                    	addErrorImg($(this));
                    	var errorMsg = "Die Tabellenspalte E-Mail, muss bei jedem Feld ein @ enthalten";
                    	if(errors.indexOf(errorMsg)==-1){
                    		errors.push(errorMsg);
                    		console.log(errorMsg);
                    	}
                    }
                    break;
                case "telefon":
                    if (!(new RegExp("^[0-9\\+\\-)(\\s]*$").test(($(this).val())))) {
                        addErrorImg($(this));
                        var errorMsg = "Die Tabellenspalte Telefon, darf nicht leer sein.";
                        if (errors.indexOf(errorMsg) == -1) {
                            errors.push(errorMsg);
                        }
                    }
                    break;
                case "id":
                    if (!(new RegExp("[1-9]$").test($(this).val()))) {
                        addErrorImg($(this));
                    }
                    break;
                default:
                    break;
            }
        })
        console.log(errors);
        return false;
    })
})

//class ErrorHandlerHelper{
//	constructor()
//	{
//		this.errors = [];
//	}
//	
//	get errors(){
//		return this.errors;
//	}
//	
//	set errors(message){
//		this.errors.push(message);
//	}


//function addErrorIfRegexFails(regex, element) {
//	if (!(regex.test(element.val()))) {
//		addErrorImg(element);
//	}
//}
//
//function addErrorIfEmpty(inputBox) {
//	if (inputBox.val() == "") {
//		addErrorImg(inputBox);
//	}
//}

function addErrorImg(inputBox) {
    inputBox.css("background-image", "url(public/imgs/error.png)");
    inputBox.css("background-repeat", "no-repeat");
    inputBox.css("background-position", "right");

}
//}