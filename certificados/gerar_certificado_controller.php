<?php

require_once("../constants/asser_eventos_constants.php");
require_once("../cfg/Session.php");
$session = new Session(SESSION_SERVER_ID);

require_once('../utils/common.php');
require_once '../repositorio/InscricaoRepository.php';
require_once '../repositorio/facade/EventosAsserFacade.php';


$studentSubscriptionRepository  = EventosAsserFacade::createInscricaoRepository();

require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

// reference the Dompdf namespace
use Dompdf\Dompdf;
$dompdf = new Dompdf();


$email = base64_decode($_GET['e']);
$year  = $_GET['y'];


if( is_null($email) ) {
    header("Location:certificado_invalido.php");
    return;
}



$header = $studentSubscriptionRepository->findCertificateHeaderByYear($year);
$text   = $studentSubscriptionRepository->findCertificateBodyByYear($year);


$html = "
 <img src=\"../imagens/$header\" style=\"height: 80%; width: 85%;\"/>
    <br/>
    <div id=\"header\">
        <p>
        <h1 style=\"text-align: center\"> Certificado de Participação</h1>
        </p>
        <br/>
        <hr/>
    </div>
    <div id=\"content\">
        <p>
        <h3 style=\"text-align: justify;
                   font-style: normal;
                   font-weight: 100;
                   font-size: large;
                   padding: 5px 5px 5px 5px;
                   line-height: 30px\">

        $text
         
        </h3>
        </p>
        <p>
        <h3 style=\"text-align: center\"> Rio Claro, [onshow.datefmt] </h3>
        <img src=\"digital-sig.png\" style=\"padding-left: 50%;width: 40%;height: 40%;\"/>
        </p>        
    </div>

    <div id=\"footer\">

    </div> 
";



$subscription = $studentSubscriptionRepository->findCertificateAssociatedToSubscriptionByEmail($email, $year);


if( is_null($subscription) ) {
    header("Location:certificado_invalido.php");
    return;
}



$html = str_replace("[onshow.fullname]", $subscription['nome'], $html);
$html = str_replace("[onshow.coursename]", $subscription['nome_curso'], $html);
$html = str_replace("[onshow.hours]", "10", $html);
$html = str_replace("[onshow.datefmt]", "10 de novembro de 2018", $html);


$dompdf->loadHtml( $html );

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dateTime = date_create('now')->format('Y-m-d.His');
$dompdf->stream("cert_mostra_".$dateTime);

?>