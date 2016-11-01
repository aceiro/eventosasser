<?php
header("Content-Type: text/html; charset=UTF-8", true);

require_once '../cfg/Session.php';
require_once '../utils/common.php';
require_once '../constants/asser_eventos_constants.php';
require_once '../repositorio/models/Trabalho.php';
require_once '../repositorio/facade/EventosAsserFacade.php';

$session = new Session("EventosAsser2016");
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
    <link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css">


    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../scripts/asser-main-menu.js"></script>
    <script src="../scripts/asser-commum.js"></script>

    <link rel="stylesheet" href="../scripts/tablesorter/blue/style.css" type="text/css"
          media="print, projection, screen">
    <link rel="stylesheet" href="../css/teacher-evaluation-style.css" type="text/css">
    <script type="text/javascript" src="../scripts/tablesorter/jquery.tablesorter.js"></script>


    <script type="application/javascript">
        $(function () {
            evc.init();
            evc.addSelectOptionCourse('select-content');
            evc.addTableFilter('#abstracts-table', '#select-content select');
        });

        var evc = ASSER.courses;
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
          onclick="javascript:location.href='../adm/professor_perfil.php'"> voltar </span>


    <div id="listar-coteudo">
        <form id="register-form" name="register-form" method="post" action="../adm/av_resumo.php">
            <fieldset>
                <legend style="width: 155px"> Formulário de Avaliação</legend>

                <div class="filter-container">
                    <div> Curso:</div>
                    <div id="select-content"></div>
                    <div> ID:</div>
                    <div>
                        <input type="text" name="id" id="id" size="5" maxlength="5"/>
                        <input name="avaliar" type="submit" id="avaliar" value="Avaliar"/>
                    </div>
                </div>
                <div>
                    <table id="abstracts-table" class="tablesorter">

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Aluno</th>
                            <th>Curso</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        define('ROW_TEMPLATE', '<tr class=\'{COLOR}\'><td>{ID}</td><td>{TITULO}</td><td>{ALUNO}</td><td>{CURSO}</td><td>{STATUS}</td></tr> ');

                        foreach ($repository->findAllTrabalhosAndAutores() as $row) {
                            $status = $row['status'];
                            $colorClass = 'rowNoneColor';
                            switch ($status) {
                                case 0: {
                                    $result = "<span class=\"glyphicon glyphicon-list-alt rowNoneColor\" style='text-align: center'>  Enviado </span>";
                                    $colorClass = '';
                                    break;
                                }
                                case 1: {
                                    $result = "<span class=\" glyphicon glyphicon-ok-circle\"></span><br/>Aprovado";
                                    $colorClass = 'rowGreenColor';
                                    break;
                                }
                                case 2: {
                                    $result = "<span class=\" glyphicon glyphicon-ban-circle\" style='text-align: center'></span><br/>Re-enviar";
                                    $colorClass = 'rowYellowColor';
                                    break;
                                }
                                case 3: {
                                    $result = "<span class=\" glyphicon glyphicon-remove-circle\"></span><br/>Reprovado";
                                    $colorClass = 'rowRedColor';
                                    break;
                                }
                                case 4: {
                                    $result = "<span class=\" glyphicon glyphicon glyphicon-pencil\"></span><br/>Corrigido";
                                    $colorClass = 'rowBlueColor';
                                    break;
                                }
                                default: {
                                    $result = "-";
                                }
                            }


                            $rowBuildId = str_replace("{ID}", $row['id'], ROW_TEMPLATE);
                            $rowBuildTitle = str_replace("{TITULO}", $row['titulo'], $rowBuildId);
                            $rowBuildName = str_replace("{ALUNO}", $row['nome'], $rowBuildTitle);
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
        </form>

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
