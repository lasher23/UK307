<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
</head>
<body>
    <form id="formular" action="validate" method="POST">
    <fieldset>
        <legend>Personen angaben</legend>

        <label for="name">Name: </label>
        <input name="name" type="text" id="name"><br>

        <label for="phone">Telefon: </label>
        <input name="phone" type="text" id="phone"><br>

        <label for="email">Email: </label>
        <input name="email" type="text" id="email"><br>

    </fieldset>

    <fieldset>
        <legend>Hotel</legend>

        <label for="shuttleBus"> Wir möchten den Shuttle-Bus-Service beanspruchen:</label>
        <input name="shuttleBus" value="1" type="checkbox" id="shuttleBus"><br>

        <label for="amountPersons">Wie viele Personen werden von Ihrer Firma teilnehmen?:</label>
        <input name="amountPersons" min="0" type="number" id="amountPersons"><br>    

        <p> In welchem Hotel möchten Sie übernachten?</p>
        <input type="radio" name="hotel" id="hotel-inter" value="InterContinental Davos">
        <label for="hotel-inter">InterContinental Davos</label>
        <input type="radio" name="hotel" id="hotel-steinberger" value="Steinberger Grandhotel Belvédère">
        <label for="hotel-steinberger">Steinberger Grandhotel Belvédère</label>

        <label for="program"> Was möchten Sie am Abend unternehmen?</label>
        <select name="program" id="program">
            <option value="">Kein Abendprogramm</option>
            <option value="Billardturnier">Billardturnier</option>
            <option value="Bowlingturnier">Bowlingturnier</option>
            <option value="Weindegustation">Weindegustation</option>
            <option value="Asiatischer Kochkurs">Asiatischer Kochkurs</option>
            <option value="Tankzurs für Webentwickler">Tankzurs für Webentwickler</option>
            <option value="Ying &amp; Yang Yoga Einsteigerkurs">Ying &amp; Yang Yoga Einsteigerkurs</option>
        </select><br>
        

    </fieldset>

    <fieldset>
        <legend>Sonstiges</legend>

        <label for="note">Haben Sie sonst noch einen Wunsch oder eine Bemerkung?</label>
        <textarea name="note" id="note" rows="3"></textarea><br>
    </fieldset>

    <input type="submit" value="Anmelden">

    </form>
    <ul id="errorList"></ul>
    <?php
    if(count($errors)){
        foreach ($errors as $key) {
            print $key;
        }
    }
    ?>
</body>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script>
    $(function() {
        $('#formular').on('submit', function(){
            var errors = [];

            if($('#name').val()===''){
                errors.push('Bitte geben sie einen Namen ein');
            }
            if($('#phone').val()===''){
                errors.push('Bitte geben sie eine Telefonnummer ein');
            }else if(!(new RegExp("/(\\+[0-9]{2} [0-9]{2} [0-9]{3} [0-9]{2} [0-9]{2})+/", $('#phone').val()))){
                errors.push('Bitte geben sie eine gültige Telefonnummer ein');
            }
            if($('#email').val()===''){
                errors.push('Bitte geben sie eine E-Mail ein');
            }else if(!(new RegExp("/^\\w+([\\.-]?\\w+)*@\\w+([\\.-]?\\w+)*(\\.\\w{2,3})+$/", $('#email').val()))){
                errors.push('Bitte geben sie eine gültige E-Mail ein');
            }

            renderErrors(errors);
            if(errors.length>0){
                return false;
            }
        });

 
   
    });
    
           function renderErrors(errors) {

            var $errorList = $('#errorList');

            // Bestehende <li> entfernen
            $errorList.html('');

            errors.forEach(function(error) {
                $errorList.append('<li>' + error + '</li>');
            });

            $errorList.show();
        }
</script>
</html>