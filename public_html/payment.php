<?php
$page_title = 'Pagos';
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

        $errors = array(); // Initialize an error array.
        // revisar :
        if (empty($_POST['first_name'])) {
            $errors[] = 'Falta confirmar su informacion.';
        } else {
            $ema = mysqli_real_escape_string($dbc, trim($_POST['email']));
        }
        if (empty($_POST['ticket'])) {
            $errors[] = 'Falta ingresar su No. de Recibo.';
        } else {
            $tic = mysqli_real_escape_string($dbc, trim($_POST['ticket']));
        }
		        if (empty($_POST['amount'])) {
            $errors[] = 'Falta ingresar su Importe de Recibo.';
        } else {
            $am = mysqli_real_escape_string($dbc, trim($_POST['amount']));
        }
		
		
		$pay = mysqli_real_escape_string($dbc, trim($_POST['payment']));
		
        // fin de revisar
		if (empty($errors)) { // If everything's OK.
////Codigo de accion

$ticket = $_POST['ticket'];
$ext = end(explode('.', $_FILES['file']['name']));
$file= $ticket. "." . $ext;

////
////
////
if (isset($_FILES['file'])) {
		
		// Validate the type. Should be JPEG or PNG.
		$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
		if (in_array($_FILES['file']['type'], $allowed)) {
		
			// Move the file over.
			if (move_uploaded_file ($_FILES['file']['tmp_name'], "tickets/{$file}")) {
				
				$q = "INSERT INTO payments (email, payment, ticket, amount, file, registration_date)
		      VALUES ('$ema', '$pay', '$tic', '$am','$file', NOW())";
        $r = @mysqli_query($dbc, $q); // Run the query.
        if ($r) {
				
				echo '<h1>Gracias!</h1>
		<p>Ha quedado registrado.</p><p><br /></p>';
				
			}} // End of move... IF.
			
		} else { // Invalid type.
			echo '<p class="error">Por favor seleccione un archivo JPEG o PNG.</p>';
		}

	} // End of isset($_FILES['upload']) IF.
	
	// Check for an error:
	if ($_FILES['file']['error'] > 0) {
		echo '<p class="error">El archivo no pudo ser cargado por: <strong>';
	
		// Print a message based upon the error.
		switch ($_FILES['file']['error']) {
			case 1:
				print 'El archivo es mayor al tamaño permitido.';
				break;
			case 2:
				print 'El archivo es mayor al tamaño permitido.';
				break;
			case 3:
				print 'El archivo se subio parcialmente.';
				break;
			case 4:
				print 'No se subio ningun archivo.';
				break;
			case 6:
				print 'La Carpeta temporan no esta disponible.';
				break;
			case 7:
				print 'Error de escritura.';
				break;
			case 8:
				print 'Se detuvo la transferencia.';
				break;
			default:
				print 'Error de Sistema.';
				break;
		} // End of switch.
		
		print '</strong></p>';
	
	} // End of error IF.
	
	// Delete the file if it still exists:
	if (file_exists ($_FILES['file']['tmp_name']) && is_file($_FILES['file']['tmp_name']) ) {
		unlink ($_FILES['file']['tmp_name']);
	}		
////Codigo de accion
		}

/////// OK HACIA ABAJO
        else { // Report the errors.
            echo '<h1>Error!</h1>
			<p class="error">El siguiente error(es) sucedieron:<br />';
            foreach ($errors as $msg) { // Print each error.
                echo " - $msg<br />\n";
            }
            echo '</p><p>Por favor, intente de nuevo.</p><p><br /></p>';
        } // End of if (empty($errors)) IF.

        mysqli_close($dbc); // Close the database connection.
    }// End of  if ($_SERVER['REQUEST_METHOD'] == 'POST').
// End of if ($_POST['send']).
?>

<h1>Pagos</h1>
<form action="payment.php" enctype="multipart/form-data"  method="post">
    <p>Correo: <input type="text" name="email" size="20" maxlength="40" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  />
        <input type="submit" name="search" value="Buscar" /></p>
    <p>Nombre: <input type="text" name="first_name" readonly="readonly" size="15" maxlength="20" value= "<?php echo $fn ?>"/></p>
    <p>Apellido: <input type="text" name="last_name"  readonly="readonly" size="15" maxlength="40" value="<?php echo $ln ?>" /></p>
    <p>Pago:<select id="payment" name="payment">
            <option value="1" <?= isset($_POST['payment']) && $_POST['payment'] == "1" ? 'selected="selected"' : '' ?>>1</option>
            <option value="2" <?= isset($_POST['payment']) && $_POST['payment'] == "2" ? 'selected="selected"' : '' ?>>2</option>
        </select></p>
    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
    <p>No. de Folio Electronico: <input type="text" name="ticket" size="7" maxlength="6" value="<?php if (isset($_POST['ticket'])) echo $_POST['ticket']; ?>" <h6> (Últimos 6 Digitos)</h6></p>
    
    <p>Importe del Recibo: $<input type="number" maxlength="7"  name="amount" size="2" value="<?php if (isset($_POST['amount'])) echo $_POST['amount']; ?>" </> </p>
    
    <p><b>File:</b> <input type="file" name="file" /></p>
    <legend>Elije una imagen  JPEG o PNG de 1 MB o menor :</legend>
    <input type="submit" name="submit" value="Enviar" />
</form>


<?php include ('includes/footer.html'); ?>
