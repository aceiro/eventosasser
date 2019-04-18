<?php
require_once("../cfg/Session.php");
require_once("../constants/asser_eventos_constants.php");
require_once '../repositorio/models/Curso.php';
require_once '../repositorio/facade/EventosAsserFacade.php';


$session = new Session(SESSION_SERVER_ID);
$summaryRepository     = EventosAsserFacade::createTrabalhoRepository();
$adviserRepository   = EventosAsserFacade::createOrientadorRepository();
$participantSummaryRepository = EventosAsserFacade::createParticipanteTrabalhoRepository();
$courseRepository = EventosAsserFacade::createCursoRepository();



header("Content-Type: text/html; charset=UTF-8", true);

?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
    
</head>

<body>
<div id="">

    
    <?php
            $isToShowCourse = array();
            $results = $summaryRepository->findAllSummariesIds();
            foreach ($results as $result) {
                $summaryId = $result['id']; 
                $summary = $summaryRepository->findOne( $summaryId ) ;

                $summaryId        = $summary->id;
                $summaryTitle     = $summary->titulo;
                $summaryBody      = $summary->resumo;
                $summaryKeywords  = $summary->palavras_chave;
                $adviserId        = $summary->id_orientador;
                $coAdviserId      = $summary->id_coorientador;
                $courseId         = $summary->id_curso;
               


                $adviser      = $adviserRepository->findOne($adviserId);
                $coAdviser    = $adviserRepository->findOne($coAdviserId);
                $adviserName  = $adviser->nome;
                $course       = $courseRepository->findOne($courseId);
                

                //
                // check if exists adviser
                //
                if( isset($adviser) ) {
                    $adviserName = $adviser->nome;
                } else {
                    $adviserName = "";
                }

                //
                // check if exists co-adviser
                //
                if( isset($coAdviser) ) {
                    $coAdviserName = $coAdviser->nome;    
                }else{
                    $coAdviserName = "";    
                }



                //
                // check if exists adviser and co-adviser are not same
                // and if they are not empty
                //
                $isToShowCoAdviser = false;
                if ( strlen($coAdviserName)>0 && $adviserName != $coAdviserName) {
                    $isToShowCoAdviser = true;
                }



                //
                // build authors and emails list
                $autors        = $participantSummaryRepository->findAutoresByTrabalhoId($summaryId);
                $autorsDetails = "";

                $autorSize      = count($autors);
                $pos            = 1;
                foreach ($autors as $autor) {
                    $autorsDetails.= ' '. $autor['nome']. ' - ' . $autor['email'] ;
                    $pos++;
                    if($pos <= $autorSize)
                        $autorsDetails.=';';
                }


                //
                // print course header on the left side
                //
                if( !isset( $isToShowCourse["$courseId"]) ){
                    echo '<section>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<br/>';
                    echo '<p style="text-align: right; font-size: x-large; font-weight: bold">'. $course['nome'] . ' </p>';
                    $isToShowCourse["$courseId"] = 'true';
                    echo '<br style="page-break-before: always">';
                    echo '</section>';

                }

                echo '<p style="text-align: center; font-size: large; font-weight: bold">'. $summaryTitle . '</p>';
                echo '<p style="text-align: center; font-size: small">'. $autorsDetails . '</p>';
                echo '<p style="text-align: center; font-size: small"> (O) '. $adviserName . '</p>';
                
                if( $isToShowCoAdviser ){
                   echo '<p style="text-align: center; font-size: small"> (C) '. $coAdviserName . '</p>';
                }

                echo '<br/>';
                echo '<p style="text-align: center; font-size: large; margin-top: 5px; bold"> RESUMO </p>';
                echo '<p style="text-align: justify; margin-left: 50px; margin-right: 50px; font-size: small ">' . $summaryBody . '</p>';
                echo '<p style="text-align: left; font-size: large; font-weight: bold; margin-left: 50px;">
                    Palavras-chave: ' . $summaryKeywords . '</p>';

                echo '<br style="page-break-before: always">';
            }
            ?>
</div>
</body>
</html>