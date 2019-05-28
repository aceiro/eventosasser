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
            $isToShowCourse = array();
            $results = $summaryRepository->findAllSummariesIds();
            foreach ($results as $result) {
                $summaryId = $result['id']; 
                $summary   = $summaryRepository->findOne( $summaryId ) ;

                $summaryId        = $summary->id;
                $summaryTitle     = $summary->titulo;
                
                $adviserId        = $summary->id_orientador;
                $coAdviserId      = $summary->id_coorientador;
                
               


                $adviser      = $adviserRepository->findOne($adviserId);
                $coAdviser    = $adviserRepository->findOne($coAdviserId);
                $adviserName  = $adviser->nome;
                
                

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
                $autors = $participantSummaryRepository->findAutoresByTrabalhoId($summaryId);
                $autorsDetails = "";

                $autorSize      = count($autors);
                $pos            = 1;
                foreach ($autors as $autor) {
                    $autorsDetails.= ' '. $autor['nome'];
                    $pos++;
                    if($pos <= $autorSize)
                        $autorsDetails.=';';
                }

                if ( !$isToShowCoAdviser ){
                    $autorsDetails .= $adviserName;
                }

                if ( $isToShowCoAdviser ){
                     $autorsDetails .= $adviserName . ";" . $coAdviserName;
                }



                echo '<p style="text-align: center; font-size: large; font-weight: bold">'. $summaryTitle . '</p>';
                echo '<p style="text-align: center; font-size: small">'. $autorsDetails . '</p>';
                echo '<p style="text-align: center; font-size: small"> (O) '. $adviserName . '</p>';
                
    
                echo '<br style="page-break-before: always">';
            }
            ?>
</div>
</body>
</html>