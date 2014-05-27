<?php
$page_title = 'Llegadas / Salidas';
include ('includes/header.html');
require ('../MySQL_Connect.php'); // Connect to the db.
if ($_POST['search']) {

    if ((isset($_POST['email']))) { // From #.php
        $email = $_POST['email'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       
        $errors = array(); // Initialize an error array.

        if (empty($_POST['email'])) {
            $errors[] = 'Falta ingresar su correo.';
        } else {
            $ema = mysqli_real_escape_string($dbc, trim($_POST['email']));
        }

        if (empty($errors)) { // If everything's OK.
            // Register the user in the database...
            // Make the query:
            $q = "SELECT first_name, last_name FROM attendees WHERE email = '$ema'";
            $r = @mysqli_query($dbc, $q); // Run the query.
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            $fn = $row['first_name'];
            $ln = $row['last_name'];

            mysqli_close($dbc); // Close the database connection.
        }
    }
}

if ($_POST['submit']) {

    require ('../MySQL_Connect.php'); // Connect to the db.

    $errors = array(); // Initialize an error array.

    // Check for a first name:
        if (empty($_POST['first_name'])) {
            $errors[] = 'Falta confirmar su informacion.';
        } else {
            $ema = mysqli_real_escape_string($dbc, trim($_POST['email']));
        }
		if (empty($_POST['ar_date'])) {
            $errors[] = 'Falta ingresar Fecha y Hora de Llegada.';
        } else {
            $ada = mysqli_real_escape_string($dbc, trim($_POST['ar_date']));
        }
        if (empty($_POST['ar_city'])) {
            $errors[] = 'Falta ingresar ciudad de origen.';
        } else {
            $aci = mysqli_real_escape_string($dbc, trim($_POST['ar_city']));
        }
		if (empty($_POST['ar_line'])) {
            $errors[] = 'Falta ingresar linea.';
        } else {
            $ali = mysqli_real_escape_string($dbc, trim($_POST['ar_line']));
        }
		if (empty($_POST['ar_trip'])) {
            $errors[] = 'Falta ingresar no. viaje de llegada.';
        } else {
            $atr = mysqli_real_escape_string($dbc, trim($_POST['ar_trip']));
        }
		
		if (empty($_POST['dep_date'])) {
            $errors[] = 'Falta ingresar Fecha y Hora de Llegada.';
        } else {
            $dda = mysqli_real_escape_string($dbc, trim($_POST['dep_date']));
        }
		if (empty($_POST['dep_line'])) {
            $errors[] = 'Falta ingresar linea.';
        } else {
            $dli = mysqli_real_escape_string($dbc, trim($_POST['dep_line']));
        }
		if (empty($_POST['dep_trip'])) {
            $errors[] = 'Falta ingresar no. viaje de salida.';
        } else {
            $dtr = mysqli_real_escape_string($dbc, trim($_POST['dep_trip']));
        }		

		if (isset($_POST['ar_type'])) {
            $aty = mysqli_real_escape_string($dbc, trim($_POST['ar_type']));
        } if (isset($_POST['ar_other'])){
		 	$aty = mysqli_real_escape_string($dbc, trim($_POST['ar_other']));
		}
		else {
            $errors[] = 'Falta ingresar forma de viaje de Llegada';
        }

		if (isset($_POST['dep_type'])) {
            $dty = mysqli_real_escape_string($dbc, trim($_POST['dep_type']));
        } if (isset($_POST['dep_other'])){
		 	$dty = mysqli_real_escape_string($dbc, trim($_POST['dep_other']));
		}
		else {
            $errors[] = 'Falta ingresar forma de viaje de Salida';
        }	



    if (empty($errors)) { // If everything's OK.
        // Register the user in the database...
        // Make the query:
$q = "INSERT INTO arrivals (email, ar_date, ar_type, ar_city, ar_line, ar_trip, dep_date, dep_type, dep_line, dep_trip, registration_date)
VALUES ('$ema', '$ada', '$aty', '$aci', '$ali', '$atr', '$dda', '$dty','$dli', '$dtr',NOW())"; 

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

<h1>Llegadas / Salidas</h1>
<form action="arrivals.php" method="post">
    <p>Correo: <input type="text" name="email" size="20" maxlength="40" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  />
        <input type="submit" name="search" value="Buscar" /></p>
    <p>Nombre: <input type="text" name="first_name" readonly="readonly" size="15" maxlength="20" value= "<?php echo $fn ?>"/></p>
    <p>Apellido: <input type="text" name="last_name"  readonly="readonly" size="15" maxlength="40" value="<?php echo $ln ?>" /></p>
    
<h2>&nbsp;</h2>
<h2>Informacion de Llegada a Tampico</h2>
<p>Fecha / Hora: <input type="datetime-local" name="ar_date" size="13" maxlength="10" value="<?php if (isset($_POST['ar_date'])) echo $_POST['ar_date']; ?>" /></p>

 <p><label for="type">Tipo de Transporte:</label>
    <select id="type" name="ar_type">
            <option value="Avion"<?= isset($_POST['ar_type']) && $_POST['ar_type'] == "Avion" ?
        'selected="selected"' : ''
?>>Avion</option> 
            <option value="Autobus"<?= isset($_POST['ar_type']) && $_POST['ar_type'] == "Autobus" ?
        'selected="selected"' : ''
?>>Autobus</option>
             <option value="Otro"<?= isset($_POST['ar_type']) && $_POST['ar_type'] == "Otro" ?
        'selected="selected"' : ''
?>>Otro</option>
        </select>  
        
 <p>En Caso de Otro, Especificar: <input type="Text" name="ar_other" size="13" maxlength="10" value="<?php if (isset($_POST['ar_other'])) echo $_POST['ar_other']; ?>" /></p>
 
<p>Ciudad de Origen: <input type="Text" name="ar_city" size="13" maxlength="10" value="<?php if (isset($_POST['ar_city'])) echo $_POST['ar_city']; ?>" /></p>

<p>Linea: <input type="Text" name="ar_line" size="13" maxlength="10" value="<?php if (isset($_POST['ar_line'])) echo $_POST['ar_line']; ?>" /></p>

<p>No. de Viaje (Vuelo/Corrida): <input type="Text" name="ar_trip" size="13" maxlength="10" value="<?php if (isset($_POST['ar_trip'])) echo $_POST['ar_trip']; ?>" /></p>
<p></p>
<h2>Informacion de Salida de Tampico </h2>
<p>Fecha / Hora: <input type="datetime-local" name="dep_date" size="13" maxlength="10" value="<?php if (isset($_POST['dep_date'])) echo $_POST['dep_date']; ?>" /></p>

 <p><label for="type">Tipo de Transporte:</label>
        <select id="type" name="dep_type">
            <option value="Avion"<?= isset($_POST['dep_type']) && $_POST['dep_type'] == "Avion" ?
        'selected="selected"' : ''
?>>Avion</option> 
            <option value="Autobus"<?= isset($_POST['dep_type']) && $_POST['dep_type'] == "Autobus" ?
        'selected="selected"' : ''
?>>Autobus</option>
             <option value="Otro"<?= isset($_POST['dep_type']) && $_POST['dep_type'] == "Otro" ?
        'selected="selected"' : ''
?>>Otro</option>
        </select>  
        
 <p>En Caso de Otro, Especificar: <input type="Text" name="dep_other" size="13" maxlength="10" value="<?php if (isset($_POST['dep_other'])) echo $_POST['dep_other']; ?>" /></p>
 
<p>Linea: <input type="Text" name="dep_line" size="13" maxlength="10" value="<?php if (isset($_POST['dep_line'])) echo $_POST['dep_line']; ?>" /></p>

<p>No. de Viaje (Vuelo/Corrida): <input type="Text" name="dep_trip" size="13" maxlength="10" value="<?php if (isset($_POST['dep_trip'])) echo $_POST['dep_trip']; ?>" /></p>

    <input type="submit" name="submit" value="Enviar" />
</form>

<?php include ('includes/footer.html'); ?>
