<?php
header("Content-Type: text/html; charset=UTF-8", true);

require_once '../cfg/Session.php';
require_once '../utils/common.php';
require_once '../constants/asser_eventos_constants.php';
require_once '../repositorio/models/Trabalho.php';
require_once '../repositorio/facade/EventosAsserFacade.php';

$session = new Session(SESSION_SERVER_ID);
$repository = EventosAsserFacade::createTrabalhoRepository();


if (!strcmp($session->get(SESSION_KEY_LOGIN_ACADEMIC), null)) {
    header('Location: ../');
    die();
}
?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="cache-control" content="no-store"/>
    <link rel="shortcut icon" href="../favicon.ico">
    <title>Asser Eventos</title>

    <!-- adicionado o suporte para o jquery e thema redmond -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- adicionado o suporte para o bootstrap padrão  -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- outros suporte a css da página -->
    <link rel="stylesheet" href="../html/css/menu-styles.css" type="text/css">
    <link rel="stylesheet" href="../html/css/commun-style-v1.0.0.css" type="text/css">


    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../html/scripts/asser-main-menu.js"></script>
    <script src="../html/scripts/asser-commum-1.0.3.js"></script>

    <link rel="stylesheet" href="../html/scripts/tablesorter/blue/style.css" type="text/css"
          media="print, projection, screen">
    <link rel="stylesheet" href="../html/css/teacher-evaluation-style.css" type="text/css">
    <script type="text/javascript" src="../html/scripts/tablesorter/jquery.tablesorter.js"></script>


    <script type="application/javascript">
         $(function () {
            evc.init();
            evc.addSelectOptionCourse('select-content');
            evc.addSelectYearCourse('select-year');
            evc.addTableFilter($('#abstracts-table'), '#select-content select');
            evc.addSelectYearFilter('#select-year select');

        });

        var evc = ASSER.courses;

        $(function() {
            //Created By: Brij Mohan
            //Website: http://techbrij.com
            //http://techbrij.com/html-table-row-grouping-jquery
            function groupTable($rows, startIndex, total){
                if (total === 0){
                    return;
                }
                var i , currentIndex = startIndex, count=1, lst=[];
                var tds = $rows.find('td:eq('+ currentIndex +')');
                var ctrl = $(tds[0]);
                lst.push($rows[0]);
                for (i=1;i<=tds.length;i++){
                    if (ctrl.text() ==  $(tds[i]).text()){
                        count++;
                        $(tds[i]).css('display', 'none')
                        lst.push($rows[i]);
                    }
                    else{
                        if (count>1){
                            ctrl.attr('rowspan',count);
                            groupTable($(lst),startIndex+1,total-1)
                        }
                        count=1;
                        lst = [];
                        ctrl=$(tds[i]);
                        lst.push($rows[i]);
                    }
                }
            }
            groupTable($('#abstracts-table tr:has(td)'),0,2);
            $('#abstracts-table .deleted').remove();
        });




    </script>



</head>

<body>
<div id="corpo">

    <div id="cabecalho">
    </div>

    <br/>

    <!-- menu da aplicacao -->
    <div id='cssmenu'>
        <ul>
            <li class='active'><a href='#'>Lista geral</a></li>
        </ul>
    </div>


    <!-- adiciona o suporte ao separador gradiente -->
    <div id="mmenu"> &nbsp;</div>
    <div id="mmenubar"> &nbsp;</div>
    <div id="mmenusubbar"> &nbsp;</div>
    <div id="mmenusubsubbar"> &nbsp;</div>

    <span id="small-button-class" class="small-button-back-class"
          onclick="javascript:document.cookie='id_course_selected=; expires=Thu, 01 Jan 1970 00:00:00 UTC';
                   javascript:document.cookie='id_year_event_selected=; expires=Thu, 01 Jan 1970 00:00:00 UTC'
          javascript:location.href='../adm/professor_perfil.php'"> voltar </span>


    <div id="listar-coteudo">

            <div>
                <fieldset>
                <legend style="width: 155px"> Filtros </legend>

                    <form id="select-content-form" name="select-content-form" method="post" action="#">
                        <div id="select-content"></div>
                    </form>

                    <form id="select-year-form" name="select-year-form" method="post" action="#">
                        <div id="select-year"></div>
                    </form>

                    <form id="register-form" name="register-form" method="post" action="../adm/av_resumo.php">
                        <div>
                            <label> ID:</label>
                            <input type="text" name="id" id="id" size="5" maxlength="5"/>
                            <input name="avaliar" type="submit" id="avaliar" value="Avaliar"/>
                        </div>
                    </form>
                </fieldset>
            </div>


        <fieldset>
            <legend style="width: 155px"> Lista de Resumos </legend>
            <div id="main-table">
                <table id="abstracts-table" class="tablesorter">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ano</th>
                        <th>Título</th>
                        <th>Aluno</th>
                        <th>Curso</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once '../constants/asser_eventos_constants.php';
                    define('ROW_TEMPLATE', '<tr class=\'{COLOR}\'><td>{ID}</td><td>{ANO}</td><td>{TITULO}</td><td>{ALUNO}</td><td>{CURSO}</td><td>{STATUS}</td></tr> ');
                    $id = 0; $eventId = 0;
                    if( (isset($_GET['id']) && $_GET['id']>0) ){
                        $id = $_GET['id'];
                    }else if (isset($_COOKIE['id_course_selected']) ){
                        $id = $_COOKIE['id_course_selected'];
                    }

                    if( (isset($_GET['e']) && $_GET['e']>0) ){
                        $eventId = $_GET['e'];
                    }else if (isset($_COOKIE['id_year_event_selected']) ){
                        $eventId = $_COOKIE['id_year_event_selected'];
                    }

                    if( $id == 0 && $eventId>0 )      /* find for all courses predicated star */
                        $summaries = $repository->findAllTrabalhosAndAutoresByEventId( $eventId );
                    else if( $id>0 && $eventId>0 )   /* find for specific courses */
                        $summaries = $repository->findAllTrabalhosAndAutoresByIdAndEventId( $id, $eventId );
                    else                            /* on the other hand, show all by current year*/
                        $summaries = $repository->findAllTrabalhosAndAutoresByCurrentYear();



                    foreach ($summaries as $row) {
                        $status     = $row['status'];
                        $colorClass = 'rowNoneColor';
                        switch ($status) {
                            case RESUMO_STATUS_EDITADO:
                            case RESUMO_STATUS_ENVIADO: {
                                $result = "<span class=\"glyphicon glyphicon-list-alt rowNoneColor\" style='text-align: center'>  Enviado </span>";
                                $colorClass = '';
                                break;
                            }
                            case RESUMO_STATUS_APROVADO: {
                                $result = "<span class=\" glyphicon glyphicon-ok-circle\"></span><br/>Aprovado";
                                $colorClass = 'rowGreenColor';
                                break;
                            }
                            case RESUMO_STATUS_REENVIAR: {
                                $result = "<span class=\" glyphicon glyphicon-ban-circle\" style='text-align: center'></span><br/>Re-enviar";
                                $colorClass = 'rowYellowColor';
                                break;
                            }
                            case RESUMO_STATUS_REPROVADO: {
                                $result = "<span class=\" glyphicon glyphicon-remove-circle\"></span><br/>Reprovado";
                                $colorClass = 'rowRedColor';
                                break;
                            }
                            case RESUMO_STATUS_CORRIGIDO: {
                                $result = "<span class=\" glyphicon glyphicon glyphicon-pencil\"></span><br/>Corrigido";
                                $colorClass = 'rowBlueColor';
                                break;
                            }
                            default: {
                                $result = "-";
                            }
                        }


                        $rowBuildId     = str_replace("{ID}", $row['id'], ROW_TEMPLATE);
                        $rowBuildYear   = str_replace("{ANO}", $row['ano'], $rowBuildId);
                        $rowBuildTitle  = str_replace("{TITULO}", $row['titulo'], $rowBuildYear);
                        $rowBuildName   = str_replace("{ALUNO}", $row['nome'], $rowBuildTitle);
                        $rowBuildCourse = str_replace("{CURSO}", $row['curso'], $rowBuildName);
                        $rowBuildStatus = str_replace("{STATUS}", $result, $rowBuildCourse);
                        $rowBuildColor  = str_replace("{COLOR}", $colorClass, $rowBuildStatus);

                        echo $rowBuildColor;
                    }

                    ?>
                    </tbody>
                </table>
            </div>

        </fieldset>


    </div>
    <div id="rodape">
        <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2016, ASSER - Todos
            os direitos reservados Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    </div>
</div>
<style type="text/css">
    .rowNoneColor{}
    .rowGreenColor{
        background-color: green;
    }
    .rowYellowColor{
        background-color: yellow;
    }
    .rowRedColor{
        background-color: darkred;
    }
    .rowBlueColor{
        background-color: blue;
    }

</style>

</body>
</html>
