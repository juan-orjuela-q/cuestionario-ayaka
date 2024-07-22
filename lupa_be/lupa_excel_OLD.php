<?php

//https://github.com/mk-j/PHP_XLSXWriter
require('xlsxwriter.class.php');

$usuario = "";
$password = "";

if(isset($_POST['floatingInput'])) $usuario = $_POST['floatingInput'];
if(isset($_POST['floatingPassword'])) $password = $_POST['floatingPassword'];

if($usuario=="lupa@creativa" && $password=="LP2022*")
{
//$dbConn = mysqli_connect("158.69.62.141:49153", "root", "255776", "lupa");
$dbConn = mysqli_connect("localhost", "u982284721_temores", "e5n1DZ7$9kCu", "u982284721_temores");

if (!$dbConn) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

 $fname='encuesta_lupa_creativa.xlsx';
 
 
 $sql = "SELECT `id`,`uuid`,`frase`,`vivir`,`temor_ideas`,`temor_autoestima`,`temor_social`,`temor_tarde`,`temor_mercado`,
                `temor_fracaso`,`temor_recursos`,`time_log`,`nombre`,`genero`,`profesion`,`email`,`creativa`,`dedicacion`,`apasiona`,
                `temores_finales`, `compartir`, `creativa_porque`, `apasiona_porque`, `pais`, `edad`, `ocupacion`
                FROM encuesta ORDER BY time_log";
 
 $header1 = [ 'Fecha' => 'date',
              'Pais' => 'string',
              'Edad' => 'string',
              'Genero' => 'string',
              'Profesion' => 'string',
              'Ocupacion' => 'string',
              'Email' => 'string',
              'Compartir inf.' => 'string',
              'Acepta terminos' => 'string',
              'Persona creativa' => 'string',
			  'Porque no' => 'string',
              'A que se dedicaria' => 'string',
              'Frase que lo identifica' => 'string',
              'Vivir de lo que apasiona' => 'string',
              'Porque' => 'string',
              'Temor a las ideas' => 'string',
              'Temores de autoestima' => 'string',
              'Temores sociales y de reconocimiento' => 'string',
              'Temor a que sea tarde' => 'string',
              'Temor hacia el mercado' => 'string',
              'Temor al fracaso' => 'string',
              'Temores por falta de tiempo y recursos' => 'string',
              'Temores finales' => 'string'
               ];

$stmt = $dbConn->prepare($sql); 
//$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$encuesta = $result->fetch_all(MYSQLI_ASSOC); // fetch data   

$data1 = array();
foreach($encuesta as $row){
  $registro = array( $row['time_log'], $row['pais'], $row['edad'], $row['genero'], $row['profesion'], $row['ocupacion'], 
    $row['email'], $row['compartir'], "SI", $row['creativa'], $row['creativa_porque'],  $row['dedicacion'], $row['frase'], 
    $row['apasiona'], $row['apasiona_porque'], $row['temor_ideas'], $row['temor_autoestima'], $row['temor_social'], 
    $row['temor_tarde'], $row['temor_mercado'], $row['temor_fracaso'], $row['temor_recursos'], $row['temores_finales']);
  array_push($data1,$registro);
}
mysqli_close($dbConn);
 //$data1 = [ ['2021-04-20', 1, 27, '44.00', 'twig'], ['2021-04-21', 1, '=C1', '-44.00', 'refund'] ];
 

 $data2 = [ ['2','7','??I???? ?†?-?'],
            ['4','8','??'] ];

 $styles2 = array( ['font-size'=>6],['font-size'=>8],['font-size'=>10],['font-size'=>16] );

 $writer = new XLSXWriter();
 $writer->setAuthor('LFBA');
 $writer->writeSheet($data1,'Encuesta', $header1);  // with headers
 //$writer->writeSheet($data2,'MySheet2');            // no headers
 //$writer->writeSheetRow('MySheet2', $rowdata = array(300,234,456,789), $styles2 );

 //$writer->writeToFile($fname);   // creates XLSX file (in current folder) 
 //echo "Wrote $fname (".filesize($fname)." bytes)<br>";

 // ...or instead of creating the XLSX you can just trigger a
 // download by replacing the last 2 lines with:
/**/
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="'.$fname.'"');
  header('Cache-Control: max-age=0');
  try{
    $writer->writeToStdOut();
	//$writer->writeToFile("test.xlsx");   // creates XLSX file (in current folder) 
    //echo "Wrote $fname (".filesize($fname)." bytes)<br>";
  }
  catch(Exception $e){
	  print_r($e);
  }
/**/
}
else
{
?>

<html>
<head>

<link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
<link href="signin.css" rel="stylesheet">
</head>
<body>

<main class="form-signin w-100 m-auto">
  <form method="post" action="lupa_excel.php">
    <img class="mb-4" src="lupa-creativa.svg" alt="" width="72" height="57">
    <h1 class="h4 mb-4 fw-normal">Ingrese credenciales de acceso</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Usuario</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Contrase&ntilde;a</label>
    </div>

    <!--
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    -->
    <input class="w-100 btn btn-lg btn-primary" type="submit" value="Obtener reporte" />
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    <?php
if($usuario!="" && $password!="")
{
//print_r($_POST);
?>
<p style='color:red'>Credenciales incorrectas</p>
<?php
}
?>
  </form>
</main>

</body>
</html>
<?php
}
?>