<?php
require_once 'conectar.php';
$conn = OpenCon();

if ($conn->connect_errno) {
   die("error de conexión: " . $conn->connect_error);
}else{
	$sql = "SELECT * FROM listadocompleto";

  $datos = mysqli_query($conn, $sql);
 echo '<table style="border:1px solid black;">';
   echo '<tr style="border:1px solid black; padding:10px;background-color:blue;color:white;">';
   echo' <td style="border:1px solid black; padding:10px;">DNI</td>';
    echo' <td style="border:1px solid black; padding:10px;">Nombre</td>';
	 echo' <td style="border:1px solid black; padding:10px;">Fecha</td>';
	  echo' <td style="border:1px solid black; padding:10px;">Factura</td>';
	   echo' <td style="border:1px solid black; padding:10px;">Total</td>';
   echo '</tr>';
  while($row = mysqli_fetch_assoc($datos)){
	  echo '<tr style="border:1px solid black; padding:10px;">';
    echo ('<td style="border:1px solid black; padding:10px;">'.$row['dni'].'</td>');
	  echo ('<td style="border:1px solid black; padding:10px;">'.$row['nombre'].'</td>');  
	  echo ('<td style="border:1px solid black; padding:10px;">'.$row['fecha'].'</td>');
	    echo ('<td style="border:1px solid black; padding:10px;">'.$row['factura'].'</td>');
		  echo ('<td style="border:1px solid black; padding:10px;">'.$row['total'].'</td>');
		
echo '</tr>';
  }
	echo '</table'>
	 CloseCon($conn);
}
?>