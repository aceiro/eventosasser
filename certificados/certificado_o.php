<?php 	
	require_once("../Session.php");
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	require('fpdf.php');
	error_reporting(0);
	ini_set("display_errors", 0 );
	$session->set('ra',$_POST['ra']);
	$bd->buscaAlunoO();

	if($session->get('nome')==null){
		echo '<br /><br /><p align="center">' . "RA não registrado, ou presença não confirmada, 
		ou pagamento não efetuado!" . '</p><br /><br />';
		echo '<br /><br /><p align="center">' . '<a href="../">Voltar</a>' . '</p>';
	}else{
			
		$pdf = new FPDF('L');
		$pdf->AddPage();
		$pdf->Image('logo1.png',10,10,-450);

		$pdf->SetFont('times','B',16);
		$pdf->Cell(50,20,'');
		$str = 'ESRC - ESCOLA SUPERIOR DE TECNOLOGIA E EDUCAÇÃO DE RIO CLARO';
		$pdf->Cell(0,20,$str,0,0,'C');
		$pdf->SetFont('times','B',14);
		$str = 'ASSER - ASSOCIAÇÃO DAS ESCOLAS REUNIDAS';
		$pdf->Cell(-140,40,$str,0,1,'C');

		//certificado
		$pdf->SetFont('times','B',34);
		$pdf->Cell(0,30,"CERTIFICADO",0,1,'C');


		//certificamos
		$pdf->SetFont('times','B',14);
		$pdf->Cell(0,20,"Certificamos que " . $session->get('nome') . ",",0,1,'C');

		//texto
		$str = 'Participou do V Workshop e da VII - Mostra de Iniciação Científica 2016 das Faculdades ASSER - Rio Claro, realizada no período de 30 de maio a 01 de junho, como ouvinte totalizando 30 horas.');
		$pdf->setFont('times','',14);
		$pdf->MultiCell(0,10,$str,0,'J');
		 
		$pdf->Cell(0,5,"",0,1,'C');
		$pdf->Cell(0,10,"Rio Claro, 05 de junho de 2016.",0,1,'C');
		$pdf->Cell(0,10,"_______________________________",0,1,'C');
		$pdf->Cell(0,5,"Prof. Dr. Artur Darezzo Filho",0,1,'C');
		$pdf->Cell(0,5,"Diretor da ESRC/ASSER",0,1,'C');

		$pdf->Image('logo.png',250,170,-300);

		$pdf->AddPage();
		$pdf->setFont('times','B',14);
		$str = 'Programação V Workshop  e VII Mostra de Iniciação Científica - 2016';
		$pdf->Cell(0,20,$str,0,1,'C'); 
		$pdf->setFont('times','',11);
				
		foreach($bd->buscarPalestraO() as $row){
			$palestra = strtoupper($row['palestra']);		
			$ppalestra = utf8_decode($palestra);
			$pdf->MultiCell(250,10,$ppalestra,0,'L');
		}
		
		$pdf->setFont('times','I',10);
		$str = 'Este certificado possui validade presente carimbo e assinatura da instituição.';
		$pdf->Cell(0,20,$str,0,1,'C');
		
		$pdf->Image('logo.png',250,170,-300);
		$pdf->Output("Certificado.pdf","D");
	}
?>