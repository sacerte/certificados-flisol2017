<?php
//Desarrollado por Yaser Yamil Meshir Vargas @Sacerte https://www.linkedin.com/in/yasermeshir
include_once('PDF.php');
include_once('myDBC.php');
include_once('dbconfig.php');
	
$mat = $_POST['matricula'];
	
//Recibimos dentro de una cadena la fecha
$fechaactual = getdate();

$fecha="Bogotá D.C. $fechaactual[mday] de $fechaactual[month] de $fechaactual[year]";
	
//Se crea un objeto de PDF
//Para hacer uso de los métodos
$pdf = new PDF();
$pdf->AddPage('L', 'Letter'); 
$pdf->SetFont('Arial','B',14); 
$pdf->Image('../img/fondo.png','0','0','297','190','PNG');					
			   //IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)

//$pdf->ImprimirTexto('textoFijo.txt'); //Texto fijo 
	
//Creamos objeto de la clase myDBC
//para hacer uso del método seleccionar_persona()
$consultaPersona = new myDBC();
	
//En una variable guardamos el array que regresa el método
$datosPersona = $consultaPersona->seleccionar_persona($mat);
	
//Aquí escribimos lo que deseamos mostrar
mysql_connect("localhost","root","");
mysql_select_db("persona");
$consulta = mysql_query("SELECT * FROM persona where Matricula = '$mat'");
while($resultado = mysql_fetch_array($consulta)){
	//$pdf->SetFont('Antonio-Regular','',22);
	$pdf->SetFont('ABeeZee','',22);
	$pdf->Cell(370,50,$resultado['Nombre'],0,0,'C');
	$pdf->Ln(); 
	$pdf->SetFont('ABeeZee','',18);
	$pdf->Cell(290,-20,$resultado['Matricula'],0,0,'C');
	$pdf->Ln(); 
	//$pdf->SetFont('ABeeZee','',18);
	$pdf->SetFont('Antonio-Regular','',18);
	$pdf->Cell(290,43,'Colaboró en calidad de '.$resultado['Puesto'],0,0,'C');
}//cierre del while 
$pdf->Output(); //Salida al navegador del pdf
?>