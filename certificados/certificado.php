<?php 
	require_once("../Session.php");
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	require('fpdf.php');
	error_reporting(0);
	ini_set("display_errors", 0 );
	$session->set('email',$_POST['email']);
	$bd->buscaCertificadoP();

	if($session->get('nome')==null){
		echo '<br /><br /><p align="center">' . "E-mail não registrado, ou pagamento não efetuado!" . '</p><br /><br />';
		echo '<br /><br /><p align="center">' . '<a href="../">Voltar</a>'.'</p>';
	
	}else{		
		$pdf = new FPDF('L');
		$pdf->AddPage();
		$pdf->Image('logo1.png',10,10,-450);

		$pdf->SetFont('times','B',16);
		$pdf->Cell(50,20,'');
		$str = utf8_decode('ESRC - ESCOLA SUPERIOR DE TECNOLOGIA E EDUCAÇÃO DE RIO CLARO');
		$pdf->Cell(0,20,$str,0,0,'C');
		$pdf->SetFont('times','B',14);
		$str = utf8_decode('ASSER - ASSOCIAÇÃO DAS ESCOLAS REUNIDAS');
		$pdf->Cell(-140,40,$str,0,1,'C');

		//certificado
		$pdf->SetFont('times','B',34);
		$pdf->Cell(0,30,"CERTIFICADO",0,1,'C');


		//certificamos
		$pdf->SetFont('times','B',14);
		$pdf->Cell(0,20,"Certificamos que " . $session->get('nome') . ",",0,1,'C');

		//texto
		$str = 'Participou da VII - Mostra de Iniciação Científica 2016 das Faculdades ASSER - Rio Claro, 
				realizada no período de 30 de maio a 01 de juno, com apresentação ' . $tipo . ' do trabalho intitulado ' . $titulo . '.';
		$pdf->setFont('times','',12);
		$pdf->MultiCell(0,10,$str,0,'J');
		 
		$pdf->Cell(0,10,"",0,1,'C');
		$pdf->Cell(0,10,"Rio Claro, 05 de junho de 2016.",0,1,'C');
		$pdf->Cell(0,10,"_______________________________",0,1,'C');
		$pdf->Cell(0,5,"Prof. Dr. Artur Darezzo Filho",0,1,'C');
		$pdf->Cell(0,5,"Diretor da ESRC/ASSER",0,1,'C');
		$pdf->Image('logo.png',250,170,-300);

		ob_clean();
		$pdf->Output("Certificado.pdf","D");
	}

?>