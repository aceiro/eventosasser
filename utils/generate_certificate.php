<?php


    include("../cfg/Session.php");
    require_once('../utils/common.php');

    require_once('certificate/tbs_class.php');
    require_once('certificate/lib/tbs_plugin_opentbs_1.9.11/tbs_plugin_opentbs.php');
    require_once('certificate/build_ms_word.php');

    require_once '../constants/asser_eventos_constants.php';
    require_once '../repositorio/InscricaoRepository.php';
    require_once '../repositorio/facade/EventosAsserFacade.php';


    $studentAssignedRepository     = EventosAsserFacade::createInscricaoRepository();

    foreach ($studentAssignedRepository->findAllPagantesInscritos() as $row) {
        $event_date  = "10, de dezembro de 2017";
        $hours       = "10";
        $course_name = $row['nome_curso'];
        $full_name   = $row['nome'];
        $id          = $row['id'];
        $output_filename = "cert_mostra_2017_". $id . ".docx";

        create_msword_docx($full_name, $course_name, $hours, $event_date, $output_filename);
    }

    // This approach generate all .docx from template. 
    // After this, is need to use this command
    // a) docx to pdf   | for i in *; do libreoffice --headless -convert-to pdf $i; done
    // b) merge all pdf | pdfunite *.pdf cert-todos.pdf
    //
?>
