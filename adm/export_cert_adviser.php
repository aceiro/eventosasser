<?php
require_once("../cfg/Session.php");
require_once("../constants/asser_eventos_constants.php");
require_once '../repositorio/models/Curso.php';
require_once '../repositorio/facade/EventosAsserFacade.php';


$session = new Session(SESSION_SERVER_ID);
$summaryRepository     = EventosAsserFacade::createTrabalhoRepository();
$adviserRepository     = EventosAsserFacade::createOrientadorRepository();
$participantSummaryRepository = EventosAsserFacade::createParticipanteTrabalhoRepository();
$courseRepository = EventosAsserFacade::createCursoRepository();
$studentSubscriptionRepository  = EventosAsserFacade::createInscricaoRepository();



header("Content-Type: text/html; charset=UTF-8", true);

?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
    <style type="text/css" media="print">
        @page { 
            size: landscape;
        }
        body { 
            writing-mode: tb-rl;
        }

        
</style>
</head>

<body>
<div id="">
    <?php 
        $year = '2018'; 
        $header = $studentSubscriptionRepository->findCertificateHeaderByYear($year);
        $text   = "Certificamos para os devidos fins que <b>[onshow.fullname]</b> participou da “X MOSTRA DE INICIAÇÃO CIENTÍFICA E SEMANA DO CONHECIMENTO” que ocorreu nos dias 12, 13 e 14 de novembro de 2018 nas dependências da  Faculdade ASSER de Rio Claro. Como ORIENTADOR de trabalho(s) científicos (vide verso)";

        $html = "
             <img src=\"../imagens/$header\" style=\"height: 30%; width: 85%;\"/>
                <br/>
                <div id=\"header\">
                    <p>
                    <h1 style=\"text-align: center\"> Certificado de Orientação</h1>
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
                    <br/>
                    <p>
                    <h3 style=\"text-align: center\"> Rio Claro, [onshow.datefmt] </h3>
                    </p>
                    <p>
                    <br/>
                    <h3 style=\"text-align: center; font-weight: normal\"> -----------------------------</h3>
                    <h3 style=\"text-align: center\"> Prof. Dr. Erik Aceiro Antonio <br/>(coordenador)</h3>
                    </p>            
                </div>

                <div id=\"footer\">
                </div> 
        ";
    ?>
    
    <?php
            $isToShowCourse = array();
            $results = $summaryRepository->findAllAdviserPerYear();
            foreach ($results as $result) {              
                $adviserName  = $result['orientador'];
                $adviserId    = $result['id'];   
               
                $summaries = $summaryRepository->findAllSummariesById( $adviserId );
                $summariesDetails =  array();
                foreach ($summaries as $summary) {
                    $summaryId    = $summary['id'];
                    $summaryTitle = $summary['titulo'];


                    //
                    // build authors and emails list
                    $autors = $participantSummaryRepository->findAutoresByTrabalhoId( $summaryId );
                    $autorsDetails = "";

                    $autorSize      = count($autors);
                    $pos            = 1;
                    foreach ($autors as $autor) {
                      
                        $autorsDetails.= ' '. $autor['nome'];
                        $pos++;
                        if($pos <= $autorSize)
                            $autorsDetails.=';';
                    }
                    
                    array_push($summariesDetails, '<div><br>'.$summaryTitle.'</br>' . '<i>'.$autorsDetails.'</i></div>');

                }


                $html_aux = $html;
                $html_aux = str_replace("[onshow.fullname]", $adviserName, $html_aux);
                $html_aux = str_replace("[onshow.datefmt]", "18 de abril de 2019", $html_aux);

             
               echo $html_aux;

               // print summaries list 
               // print each of summary details
               echo '<br style="page-break-before: always"/>';
               echo '<br style="page-break-before: always"/>';

               $link = htmlentities("<http://eventosasser.com.br/anais/anais_2sem_2018.pdf>");
               echo "
               <h3><strong>Trabalhos</strong></h3>
               <hr/>
               <h3>Como citar em ABNT <br/></h3>
               <div style='text-align: justify'> 
                            SOBRENOME, PRENOME abreviado. Título: subtítulo (se houver). In: X - MOSTRA DE INICIAÇÃO CIENTÍFICA, 10., 2018, Rio Claro. <b>Anais...</b> São Paulo: ASSER Rio Claro, 2018. Disponível em $link
                </div>";

               foreach ($summariesDetails as $summary) {
                 echo $summary;
                 echo "<br/>";
                 
               }
               echo "<hr/>";
               echo '<br style="page-break-before: always"/>';
               //
               // end
            }

            ?>
</div>
</body>
</html>