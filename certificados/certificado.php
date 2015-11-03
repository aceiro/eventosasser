
<?php
require('fpdf.php');
error_reporting(0);
ini_set("display_errors", 0 );
$email = $_POST['email'];

try{
	$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
	$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "SELECT Distinct p.autor, p.titulo, p.tipo, e.curso FROM pagamento p, evento e WHERE p.pago='1' AND e.email='$email'";
						
	foreach($link->query($sql) as $row){
		$nome = strtoupper($row['autor']);
		$titulo = strtoupper($row['titulo']);	
		$tipo = strtoupper($row['tipo']);
		$curso = $row['curso'];
	}	
					
}catch(PDOException $e){
	echo "ERROR" . $e->getMessage();
}
if($nome==null){
	echo '<br /><br /><p align="center">'.utf8_decode("E-mail não registrado, ou pagamento não efetuado!").'</p><br /><br />';
	echo '<br /><br /><p align="center">'.'<a href="../">Voltar</a>'.'</p>';
	
	} else{
$nome = $nome;
		
$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->Image('logo1.png',10,10,-450);

$pdf->SetFont('Arial','B',16);
$pdf->Cell(50,20,'');
$str = utf8_decode('ESRC - ESCOLA SUPERIOR DE TECNOLOGIA E EDUCAÇÃO DE RIO CLARO');
$pdf->Cell(0,20,$str,0,0,'C');
$pdf->SetFont('Arial','B',14);
$str = utf8_decode('ASSER - ASSOCIAÇÃO DAS ESCOLAS REUNIDAS');
$pdf->Cell(-140,40,$str,0,1,'C');

//certificado
$pdf->SetFont('arial','B',34);
$pdf->Cell(0,30,"CERTIFICADO",0,1,'C');


//certificamos
$pdf->SetFont('arial','B',14);
$pdf->Cell(0,20,"Certificamos que ".utf8_decode($nome).",",0,1,'C');

//texto
$str = utf8_decode('Participou da IX - Semana Conhecimento e VI - Mostra de Iniciação Científica 2015 das Faculdades ASSER - Rio Claro, realizada no período de 14 a 18 de dezembro, com apresentação ').$tipo.' do trabalho intitulado '.$titulo.'.';
$pdf->setFont('arial','',14);
$pdf->MultiCell(0,10,$str,0,'J');
 
$pdf->Cell(0,10,"",0,1,'C');
$pdf->Cell(0,20,"Rio Claro, 18 de dezembro de 2015.",0,1,'C');
$pdf->Cell(0,10,"_______________________________",0,1,'C');
$pdf->Cell(0,5,"Prof. Dr. Artur Darezzo Filho",0,1,'C');
$pdf->Cell(0,5,"Diretor da ESRC/ASSER",0,1,'C');
$pdf->Image('logo.png',250,170,-300);

//página 2 para certificados da fisioterapia
if($curso=="Fisioterapia"){
	$pdf->AddPage();
	$pdf->setFont('arial','B',14);
	$ppalestra = utf8_decode('Programação IX - Semana Conhecimento e VI - Mostra de Iniciação Científica - 2015');
	$pdf->Cell(0,20,$ppalestra,0,1,'C');
	$pdf->setFont('arial','',12);					
	$ppalestra = utf8_decode('Segunda-feira - Programa de exercício físico em unidades de saúde - Profª Drª Camila Panini');
	$pdf->Cell(0,10,$ppalestra,0,1,'L');
	
	$ppalestra = utf8_decode('Quinta-feira - 17:00 às 20:00 - apresentação de TCCs Fisioterapia');
	$pdf->Cell(0,10,$ppalestra,0,1,'L');
	
	$ppalestra = utf8_decode('Quinta-feira - Método self healing e a conexão olho corpo - Sonia Cristina Tinos Carrocine');
	$pdf->Cell(0,10,$ppalestra,0,1,'L');
	
	$ppalestra = utf8_decode('Sexta-feira - 19:00 às 21:00 apresentação de TCCs Fisioterapia');
	$pdf->Cell(0,10,$ppalestra,0,1,'L');
}

$pdf->setFont('arial','I',10);
	$str = utf8_decode('Este certificado possui validade presente carimbo e assinatura da instituição.');
	$pdf->Cell(0,20,$str,0,1,'C');
	
$pdf->Image('logo.png',250,170,-300);
$pdf->Output("Certificado.pdf","D");
}

?>