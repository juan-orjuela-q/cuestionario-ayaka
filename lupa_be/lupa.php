<?php

if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    // you want to allow, and if so:
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 1000');
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
    }

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
        header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
    }
    exit(0);
}

//$dbConn = mysqli_connect("158.69.62.141:49153", "root", "255776", "lupa");
$dbConn = mysqli_connect("localhost", "u982284721_temores", "e5n1DZ7$9kCu", "u982284721_temores");


if (!$dbConn) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

if($_GET['update20220829']){
	$sql = "ALTER TABLE encuesta ADD COLUMN apasiona_porque VARCHAR(1024)";
	//$mysqli = new mysqli("localhost", "u982284721_temores", "e5n1DZ7$9kCu", "u982284721_temores");
	$mysqli->query($sql);
	$mysqli->close();
}

if($_POST['question']=='NOMBRE')
{
  $sql = "INSERT INTO encuesta (uuid, nombre) VALUES (?, ?)";
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $_POST["uuid"], $_POST["answer"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='GENERO')
{
  $sql = "UPDATE encuesta SET genero=? WHERE uuid=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $_POST["answer"], $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='PROFESION')
{
  $sql = "UPDATE encuesta SET profesion=? WHERE uuid=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $_POST["answer"], $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='EMAIL')
{
  $sql = "UPDATE encuesta SET email=? WHERE uuid=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $_POST["answer"], $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='COMPARTIR')
{
  $sql = "UPDATE encuesta SET compartir=? WHERE uuid=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $_POST["answer"], $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='CREATIVA')
{
  $sql = "UPDATE encuesta SET creativa=? WHERE uuid=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $_POST["answer"], $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='CREATIVA_PORQUE')
{
  $sql = "UPDATE encuesta SET creativa_porque=? WHERE uuid=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $_POST["answer"], $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='DEDICACION')
{
  $sql = "UPDATE encuesta SET dedicacion=? WHERE uuid=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $_POST["answer"], $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}


if($_POST['question']=='FRASE')
{
  $frase = "";
  if($_POST["answer"]=='A') $frase = "Vivo de hacer lo que me apasiona";
  if($_POST["answer"]=='B') $frase = "Hago lo que me apasiona sólo en mis tiempos libres";
  if($_POST["answer"]=='C') $frase = "Hay cosas que me apasionan pero no tengo el tiempo para ellas";
  if($_POST["answer"]=='D') $frase = "No he encontrado algo que me apasione";
  
  $sql = "UPDATE encuesta SET frase=? WHERE uuid=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $frase, $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='APASIONA')
{
  $sql = "UPDATE encuesta SET apasiona=? WHERE uuid=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $_POST["answer"], $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='APASIONA_PORQUE')
{
  $sql = "UPDATE encuesta SET apasiona_porque=? WHERE uuid=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $_POST["answer"], $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='TEMOR_IDEAS')
{
  $sql = "UPDATE encuesta SET temor_ideas=? WHERE uuid=?";
  $answer = $_POST['answer'];
  // Replace with text
  $answer = str_replace("A|","Temo que lo que pueda hacer ya lo haya hecho alguien antes y mejor.\r\n",$answer);
  $answer = str_replace("B|","Temo que me roben mis ideas, por lo que prefiero mantenerlas escondidas.\r\n",$answer);
  //$answer = str_replace("C|","Temor Ideas C\r\n",$answer);
  //$answer = str_replace("D|","Temor A4\r\n",$answer);
  //$answer = str_replace("E|","Temor A5\r\n",$answer);
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $answer, $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='TEMOR_AUTOESTIMA')
{
  $sql = "UPDATE encuesta SET temor_autoestima=? WHERE uuid=?";
  $answer = $_POST['answer'];
  // Replace with text
  $answer = str_replace("A|","Temo no ser lo suficientemente bueno o buena.\r\n",$answer);
  $answer = str_replace("B|","Temo estar demasiado gordo o gorda o  ser poco atractivo o atractiva.\r\n",$answer);
  $answer = str_replace("C|","Temo tener que enfrentarme a mis 'demonios interiores'\r\n",$answer);
  $answer = str_replace("D|","Temo haber dado ya lo mejor de mí.\r\n",$answer);
  //$answer = str_replace("E|","Temor B5\r\n",$answer);
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $answer, $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='TEMOR_SOCIAL')
{
  $sql = "UPDATE encuesta SET temor_social=? WHERE uuid=?";
  $answer = $_POST['answer'];
  // Replace with text
  $answer = str_replace("A|","Temo sentirme expuesto o expuesta y ser criticado o criticada, ridiculizado o ridiculizada o rechazado o rechazada.\r\n",$answer);
  $answer = str_replace("B|","Temo que mis sueños sean algo de lo que debas sentirme avergonzado o avergonzada.\r\n",$answer);
  $answer = str_replace("C|","Temo decepcionar a mi familia con mis decisiones de vida\r\n",$answer);
  $answer = str_replace("D|","Temo de las opiniones de mis amigos y colegas si expreso abiertamente la decisión de dedicarme a mi pasión.\r\n",$answer);
  $answer = str_replace("E|","Temo no tener aún la experiencia y/o habilidad necesaria para salir al mundo con mi propuesta.\r\n",$answer);
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $answer, $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='TEMOR_TARDE')
{
  $sql = "UPDATE encuesta SET temor_tarde=? WHERE uuid=?";
  $answer = $_POST['answer'];
  // Replace with text
  $answer = str_replace("A|","Temo que sea muy tarde o muy temprano para empezar a vivir de mi pasion.\r\n",$answer);
  //$answer = str_replace("B|","Temor D2\r\n",$answer);
  //$answer = str_replace("C|","Temor D3\r\n",$answer);
  //$answer = str_replace("D|","Temor D4\r\n",$answer);
  //$answer = str_replace("E|","Temor D5\r\n",$answer);
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $answer, $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br/>  " . mysqli_error($dbConn);
  }
}

if($_POST['question']=='TEMOR_MERCADO')
{
  $sql = "UPDATE encuesta SET temor_mercado=? WHERE uuid=?";
  $answer = $_POST['answer'];
  // Replace with text
  $answer = str_replace("A|","Temo no tener mercado que quiera pagar por lo que puedo hacer con mi pasión\r\n",$answer);
  $answer = str_replace("B|","Temo que mi trabajo no sea lo suficientemente relevante en la vida de nadie\r\n",$answer);
  //$answer = str_replace("C|","Temor E3\r\n",$answer);
  //$answer = str_replace("D|","Temor E4\r\n",$answer);
  //$answer = str_replace("E|","Temor E5\r\n",$answer);
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $answer, $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='TEMOR_FRACASO')
{
  $sql = "UPDATE encuesta SET temor_fracaso=? WHERE uuid=?";
  $answer = $_POST['answer'];
  // Replace with text
  $answer = str_replace("A|","Temo que al mirar atrás, mis esfuerzos en torno a mi pasión se hayan convertido en una gigantesca pérdida de dinero y tiempo.\r\n",$answer);
  $answer = str_replace("B|","Temo fracasar en el intento.\r\n",$answer);
  $answer = str_replace("C|","Temo no conseguir el resultado esperado.\r\n",$answer);
  //$answer = str_replace("D|","Temor F4\r\n",$answer);
  //$answer = str_replace("E|","Temor F5\r\n",$answer);
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $answer, $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='TEMOR_RECURSOS')
{
  $sql = "UPDATE encuesta SET temor_recursos=? WHERE uuid=?";
  $answer = $_POST['answer'];
  // Replace with text
  $answer = str_replace("A|","Temo no ser capaz de tener la disciplina necesaria.\r\n",$answer);
  $answer = str_replace("B|","Temo no tener la disponibilidad de tiempo, o la independencia financiera para centrarme en mi pasión.\r\n",$answer);
  //$answer = str_replace("C|","Temor G3\r\n",$answer);
  //$answer = str_replace("D|","Temor G4\r\n",$answer);
  //$answer = str_replace("E|","Temor G5\r\n",$answer);
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $answer, $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='TEMORES_FINALES')
{
  $sql = "UPDATE encuesta SET temores_finales=? WHERE uuid=?";
  $answer = $_POST['answer'];
  // Replace with text
  $answer = str_replace("|","\r\n",$answer);
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $answer, $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

//echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
//echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

mysqli_close($dbConn);


print_r($_POST);

?>
