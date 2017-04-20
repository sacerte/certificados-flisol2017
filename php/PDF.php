<?php
//Desarrollado por Yaser Yamil Meshir Vargas @Sacerte https://www.linkedin.com/in/yasermeshir
include_once('fpdf.php');
class PDF extends FPDF
{
	function Footer()
	{
    	$this->SetY(-15);
    	$this->SetFont('Times','',14); 
		$this->Cell(285,22,'Para validar éste certificado puede ingresar a: http://www.flisolbogota.org/certificado',0,0,'R');
	}
	
	function Header()
	{
		$this->SetFont('Arial','B',24);
    	$this->Ln(65);
	}
	
	function ImprimirTexto($file)
	{
       	$txt = file_get_contents($file);
    	$this->SetFont('Arial','',14);
    	$this->MultiCell(0,5,$txt);
    
	}
	
	function cabecera($cabecera){
		$this->SetXY(50,105);
		$this->SetFont('Arial','B',15);
		foreach($cabecera as $columna)
		{
	    	$this->Cell(40,7,$columna,1, 2 , 'L' ) ;
    	}
    }
	
    function datos($datos){
		
		$this->SetXY(90,105);
		$this->SetFont('Arial','',12);
		foreach ($datos as $columna)
		{
			$this->Cell(65,7,utf8_decode($columna['Nombre']),'TRB',1,'L' );
			$this->Cell(90,7,utf8_decode($columna['Puesto']),'TRB',1,'L' );
		}
    }
    
    //El método tabla integra a los métodos cabecera y datos
    function tabla($cabecera,$datos){
		$this->cabecera ($cabecera) ;
		$this->datos($datos);
    }
    

}//fin clase PDF
?>		