<?php
$page_title = 'Registro';
include ('includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require ('../MySQL_Connect.php'); // Connect to the db.

    $errors = array(); // Initialize an error array.
    // Check for a first name:
	
    if (empty($_POST['first_name'])) {
        $errors[] = 'Falta ingresar su nombre.';
    } else {
        $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    }

    // Check for a last name:
    if (empty($_POST['last_name'])) {
        $errors[] = 'Falta ingresar su apellido.';
    } else {
        $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    }

    // Check for age:	
    if (empty($_POST['age'])) {
        $errors[] = 'Falta ingresar su edad.';
    } else {
        $ag = mysqli_real_escape_string($dbc, trim($_POST['age']));
    }

    // Check for gender:	
    if (empty($_POST['gender'])) {
        $errors[] = 'Falta ingresar su genero.';
    } else {
        $gen = mysqli_real_escape_string($dbc, trim($_POST['gender']));
    }
    // Check for email:	
    if (empty($_POST['celphone'])) {
        $errors[] = 'Falta ingresar su celular.';
    } else {
        $cel = mysqli_real_escape_string($dbc, trim($_POST['celphone']));
	}
		
    // Check for email:	
    if (empty($_POST['email'])) {
        $errors[] = 'Falta ingresar su correo.';
    } else {
        $ema = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }

    if (empty($_POST['shirt'])) {
        $errors[] = 'Falta ingresar su correo.';
    } else {
        $sh = mysqli_real_escape_string($dbc, trim($_POST['shirt']));
    }

    // Check for community:	
    if (empty($_POST['community'])) {
        $errors[] = 'Falta ingresar su comunidad.';
    } else {
        $com = mysqli_real_escape_string($dbc, trim($_POST['community']));
    }
	
	    // Check for community:	
    if (empty($_POST['emergency'])) {
        $errors[] = 'Falta ingresar sus datos para emergencias.';
    } else {
        $em = mysqli_real_escape_string($dbc, trim($_POST['emergency']));
    }
	
	if (empty($_POST['EPEJ']) && empty($_POST['CFMCU']) ) {
        $errors[] = 'Selecciona el Evento a Asistir.';
    }if ( isset($_POST['EPEJ'])) {
		$epej= mysqli_real_escape_string($dbc, trim($_POST['EPEJ']));
    }if ( isset($_POST['CFMCU'])) {
		$cfmcu= mysqli_real_escape_string($dbc, trim($_POST['EPEJ']));
	}

	    // Check for community:	
    if (empty($_POST['phone'])) {
        $errors[] = 'Falta ingresar su telefono de emergencia.';
    } else {
        $pho = mysqli_real_escape_string($dbc, trim($_POST['phone']));
    }
	if (empty($_POST['check'])) {
        $errors[] = 'Falta Informar a tu lider.';
    }
	
	$blo = mysqli_real_escape_string($dbc, trim($_POST['blood']));
	$comm = mysqli_real_escape_string($dbc, trim($_POST['comment']));
	$me = mysqli_real_escape_string($dbc, trim($_POST['medicare']));
	$menum = mysqli_real_escape_string($dbc, trim($_POST['med_num']));


    if (empty($errors)) { // If everything's OK.
        // Register the user in the database...
        // Make the query:
        $q = "INSERT INTO attendees (first_name, last_name, age, gender, celphone, email, shirt, community, epej, cfmcu, blood, emergency, phone, medicare, med_num, comment, registration_date)
		      VALUES ('$fn', '$ln', '$ag', '$gen', '$cel','$ema', '$sh','$com',	'$epej', '$cfmcu', '$blo', '$em', '$pho', '$me', '$menum', '$comm', NOW())";
        $r = @mysqli_query($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.
            // Print a message:
            echo '<h1>Gracias!</h1>
		<p>Ha quedado registrado.</p><p><br /></p>';
        } else { // If it did not run OK.
            // Public message:
            echo '<h1>Error del Sistema</h1>
			<p class="error">No pudo ser registardo debido a un error en el sistema. Perdon por los inconvenientes.</p>';

            // Debugging message:
            echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
        } // End of if ($r) IF.

        mysqli_close($dbc); // Close the database connection.
        // Include the footer and quit the script:
        include ('includes/footer.html');
        exit();
    } else { // Report the errors.
        echo '<h1>Error!</h1>
		<p class="error">El siguiente error(es) sucedieron:<br />';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br />\n";
        }
        echo '</p><p>Por favor, intente de nuevo.</p><p><br /></p>';
    } // End of if (empty($errors)) IF.

    mysqli_close($dbc); // Close the database connection.
} // End of the main Submit conditional.
?>
<h1>Registro</h1>
<form action="register.php" method="post"id="theForm" novalidate="novalidate" >

<fieldset>
    <div class="two"><label for="first_name"><p>Nombre (s):</label><input type="text" name="first_name" size="15" maxlength="20" required value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" ></p></div>
    <div class="two"><label for="last_name"><p>Apellidos:</label><input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
    <div class="two"><label for="age"><p>Edad:</label><input type="number" name="age" size="5" maxlength="2" value="<?php if (isset($_POST['age']))
    echo $_POST['age'];
?>"   <h6> (Años cumplidos)</h6></p>
    <p><label for="gender">Género:</label>
        <select id="gender" name="gender">
            <option value="Masculino"<?= isset($_POST['gender']) && $_POST['gender'] == "Masculino" ?
        'selected="selected"' : ''
?>>Masculino</option> 
            <option value="Femenino"<?= isset($_POST['gender']) && $_POST['gender'] == "Femenino" ?
        'selected="selected"' : ''
?>>Femenino</option> 
        </select>                    
    </p>
    <p>Celular: <input type="tel" name="celphone" size="10" maxlength="10" value="<?php if (isset($_POST['celphone']))
    echo $_POST['celphone'];
?>"<h6> (10 Digitos)</h6></p>

    <p>Correo: <input type="email" name="email" size="20" maxlength="40" value="<?php if (isset($_POST['email']))
    echo $_POST['email'];
?>"  /></p>


    <p><label for="shirt">Talla de Playera:</label>
        <select id="shirt" name="shirt">
            <option value="Mujer - Ch"<?= isset($_POST['shirt']) && $_POST['shirt'] == "Mujer - Ch" ?
        'selected="selected"' : ''
?>>Mujer - Ch</option> 
            <option value="Mujer - Med"<?= isset($_POST['shirt']) && $_POST['shirt'] == "Mujer - Med" ?
        'selected="selected"' : ''
?>>Mujer - Med</option> 
<option value="Mujer - G"<?= isset($_POST['shirt']) && $_POST['shirt'] == "Mujer - G" ?
        'selected="selected"' : ''
?>>Mujer - G</option>
<option value="Mujer - EG"<?= isset($_POST['shirt']) && $_POST['shirt'] == "Mujer - EG" ?
        'selected="selected"' : ''
?>>Mujer - EG</option>
<option value="Mujer - 2X"<?= isset($_POST['shirt']) && $_POST['shirt'] == "Mujer - 2X" ?
        'selected="selected"' : ''
?>>Mujer - 2X</option>  
            <option value="Hombre - Ch"<?= isset($_POST['shirt']) && $_POST['shirt'] == "Hombre - Ch" ?
        'selected="selected"' : ''
?>>Hombre - Ch</option> 
            <option value="Hombre - Med"<?= isset($_POST['shirt']) && $_POST['shirt'] == "Hombre - Med" ?
        'selected="selected"' : ''
?>>Hombre - Med</option> 
<option value="Hombre - G"<?= isset($_POST['shirt']) && $_POST['shirt'] == "Hombre - G" ?
        'selected="selected"' : ''
?>>Hombre - G</option>
<option value="Hombre - EG"<?= isset($_POST['shirt']) && $_POST['shirt'] == "Hombre - EG" ?
        'selected="selected"' : ''
?>>Hombre - EG</option> 
<option value="Hombre - 2X"<?= isset($_POST['shirt']) && $_POST['shirt'] == "Hombre - 2X" ?
        'selected="selected"' : ''
?>>Hombre - 2X</option>  
        </select>                    
    </p>


    <p><label for="community">Comunidad:</label>
        <select id="community" name="community">
            <option value="Alianza Eterna - Merida, Yuc"
                    <?= isset($_POST['community']) && $_POST['community'] == "Alianza Eterna - Merida, Yuc" ? 'selected="selected"' : ''
                    ?>>Alianza Eterna - Merida, Yuc
            </option> 
            <option value="Betania - Acapulco, Gro"
                      <?= isset($_POST['community']) && $_POST['community'] == "Betania - Acapulco, Gro" ? 'selected="selected"' : ''
                      ?>>Betania - Acapulco, Gro
            </option>
            <option value="Ciudad Fiel - DF"
            <?= isset($_POST['community']) && $_POST['community'] == "Ciudad Fiel - DF" ? 'selected="selected"' : ''
            ?>>Ciudad Fiel - DF
            </option>
            <option value="Familia de Dios - Mc Allen, Tx"
            <?= isset($_POST['community']) && $_POST['community'] == "Familia de Dios - Mc Allen, Tx" ? 'selected="selected"' : ''
            ?>>Familia de Dios - Mc Allen, Tx
            </option>
            <option value="Incienso de Dios - Xalapa, Ver"
            <?= isset($_POST['community']) && $_POST['community'] == "Incienso de Dios - Xalapa, Ver" ? 'selected="selected"' : ''
            ?>>Incienso de Dios - Xalapa, Ver
            </option>
            <option value="Jésed - Monterrey, NL"
            <?= isset($_POST['community']) && $_POST['community'] == "Jésed - Monterrey, NL" ? 'selected="selected"' : ''
            ?>>Jésed - Monterrey, NL
            </option>
            <option value="La Sagrada Familia - Veracruz, Ver"
            <?= isset($_POST['community']) && $_POST['community'] == "La Sagrada Familia - Veracruz, Ver" ? 'selected="selected"' : ''
            ?>>La Sagrada Familia - Veracruz, Ver
            </option>
            <option value="Luz de Cristo - Ensenada, BC"
            <?= isset($_POST['community']) && $_POST['community'] == "Luz de Cristo - Ensenada, BC" ? 'selected="selected"' : ''
            ?>>Luz de Cristo - Ensenada, BC
            </option>
            <option value="Misericordia de Dios - Zitacuaro, Mich"
            <?= isset($_POST['community']) && $_POST['community'] == "Misericordia de Dios - Zitacuaro, Mich" ? 'selected="selected"' : ''
            ?>>Misericordia de Dios - Zitacuaro, Mich
            </option>
            <option value="Sagrada Familia - Tampico, Tamps"
            <?= isset($_POST['community']) && $_POST['community'] == "Sagrada Familia - Tampico, Tamps" ? 'selected="selected"' : ''
            ?>>Sagrada Familia - Tampico, Tamps
            </option>
            <option value="Siloe - San Miguel de Allende, Gto"
            <?= isset($_POST['community']) && $_POST['community'] == "Siloe - San Miguel de Allende, Gto" ? 'selected="selected"' : ''
            ?>>Siloe - San Miguel de Allende, Gto
            </option>
            <option value="Sion - Cuernavaca, Mor"
            <?= isset($_POST['community']) && $_POST['community'] == "Sion - Cuernavaca, Mor" ? 'selected="selected"' : ''
            ?>>Sion - Cuernavaca, Mor
            </option>
            <option value="Verbum Dei - Mexicali, BC"
            <?= isset($_POST['community']) && $_POST['community'] == "Verbum Dei - Mexicali, BC" ? 'selected="selected"' : ''
            ?>>Verbum Dei - Mexicali, BC
            </option>

        </select>                    
    </p>
</fieldset>
<h2>Eventos</h2>
<fieldset>
<p></p> 
<input type="checkbox" name="EPEJ" value="True" <?= isset($_POST['EPEJ']) && $_POST['EPEJ'] == "True" ? 'checked="checked"' : ''?>>Encuentro Programas Evangelisticos<br>
<input type="checkbox" name="CFMCU" value="True" <?= isset($_POST['CFMCU']) && $_POST['CFMCU'] == "True" ? 'checked="checked"' : ''?>>Casas de Formacion 
<p></p> 
</fieldset>
<h2>Informacion Medica</h2>
<fieldset>
    <p><label for="blood">Tipo de Sangre:</label>
        <select id="blood" name="blood">
            <option value="A+"<?= isset($_POST['blood']) && $_POST['blood'] == "A+" ?
        'selected="selected"' : ''
?>>A+</option> 
            <option value="A-"<?= isset($_POST['blood']) && $_POST['gender'] == "A-" ?
        'selected="selected"' : ''
?>>A-</option>
            <option value="B+"<?= isset($_POST['blood']) && $_POST['blood'] == "B+" ?
        'selected="selected"' : ''
?>>B+</option> 
            <option value="B-"<?= isset($_POST['blood']) && $_POST['gender'] == "B-" ?
        'selected="selected"' : ''
?>>B-</option>
            <option value="AB+"<?= isset($_POST['blood']) && $_POST['blood'] == "AB+" ?
        'selected="selected"' : ''
?>>AB+</option> 
            <option value="AB-"<?= isset($_POST['blood']) && $_POST['gender'] == "AB-" ?
        'selected="selected"' : ''
?>>AB-</option>
            <option value="O+"<?= isset($_POST['blood']) && $_POST['blood'] == "O+" ?
        'selected="selected"' : ''
?>>O+</option> 
            <option value="O-"<?= isset($_POST['blood']) && $_POST['gender'] == "O-" ?
        'selected="selected"' : ''
?>>O-</option> 
        </select>  
<p>En Emergencia Contactar a: <input type="text" name="emergency" size="20" maxlength="60" value="<?php if (isset($_POST['emergency'])) echo $_POST['emergency']; ?>" /></p>
<p>Telefono: <input type="tel" name="phone" size="13" maxlength="10" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>" <h6> (10 Digitos)</h6></p>
<p>Seguro Medico: <input type="tel" name="medicare" size="13" maxlength="10" value="<?php if (isset($_POST['medicare'])) echo $_POST['medicare']; ?>" <h6> (Institucion)</h6></p>
<p>Poliza: <input type="tel" name="med_num" size="13" maxlength="10" value="<?php if (isset($_POST['med_num'])) echo $_POST['med_num']; ?>" <h6> (No. Seguridad Social)</h6></p>
<p>¿Tengo alguna limitación médica y/o física? (problemas de salud, dieta especial, alergias, etc.)
<textarea rows="4" cols="40" name="comment"  maxlength="5000" value="<?php if (isset($_POST['comment'])) echo $_POST['comment']; ?>" ></textarea></p>
</fieldset>
<fieldset>
<div class="one"><p><input type="checkbox" name="terms" id="terms" value="check">Mi lider esta enterado de mi asistencia<br></p></div>
</fieldset>
    <div class="one"><p><input type="submit" name="submit" id="submit" value="Registrar" /></p></div>
</form>
    <script src="includes/js/utilities.js"></script>
    <script src="includes/js/errorMessages.js"></script>
    <script src="includes/js/register.js"></script>
            <?php include ('includes/footer.html'); ?> 