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

if($_GET['update20220909']){
    $mysqli = new mysqli("localhost", "u982284721_temores", "e5n1DZ7$9kCu", "u982284721_temores");	

    $sql = "UPDATE encuesta set pais='-',edad='-',ocupacion='-'";
	$mysqli->query($sql);
	
    $mysqli->close();
}

if($_POST['question']=='PAIS')
{
  $sql = "INSERT INTO encuesta (uuid, pais) VALUES (?, ?)";
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $_POST["uuid"], $_POST["answer"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbConn);
  }
}

if($_POST['question']=='EDAD')
{
  $sql = "UPDATE encuesta SET edad=? WHERE uuid=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $_POST["answer"], $_POST["uuid"]);
  $stmt->execute();
  if ($stmt->affected_rows>0) {
    echo "Update successfully";
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

if($_POST['question']=='OCUPACION')
{
  $sql = "UPDATE encuesta SET ocupacion=? WHERE uuid=?";
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
  $frase = $_POST["answer"];
  
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
  $answer = str_replace("|","\r\n", $_POST['answer']);
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
  $answer = str_replace("|","\r\n", $_POST['answer']);
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
  $answer = str_replace("|","\r\n", $_POST['answer']);
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
  $answer = str_replace("|","\r\n", $_POST['answer']);
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
  $answer = str_replace("|","\r\n", $_POST['answer']);
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
  $answer = str_replace("|","\r\n", $_POST['answer']);
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
  $answer = str_replace("|","\r\n", $_POST['answer']);
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
  $answer = str_replace("|","\r\n", $_POST['answer']);
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
