<?php
require_once("../cfg/BD.php");
require_once("../cfg/Session.php");
error_reporting(0);
$session = new Session("EventosAsser2016");
$bd = new BD();
header("Content-Type: text/html; charset=UTF-8", true);
include_once('../utils/common.php');
?>
<!DOCTYPE html >
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="cache-control" content="no-store" />
    <link rel="shortcut icon" href="../favicon.ico">
    <title>Asser Eventos</title>
    <!-- adicionado o suporte para o jquery e thema redmond -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- outros suporte a css da página -->
    <link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../scripts/asser-main-menu.js"></script>
    <script src="../scripts/asser-commum.js"></script>

    <style>
        article{
            background-color: #efefff;
        }

    </style>

</head>

<body>
<div id='corpo'>

    <div id='cabecalho'>
    </div>
    <br />

    <!-- menu da aplicacao -->
    <div id='cssmenu'>
        <ul>
            <li><a href='../'>Sair</a></li>
        </ul>
    </div>

    <!-- adiciona o suporte ao separador gradiente -->
    <div id='mmenu'> &nbsp;</div>
    <div id='mmenubar'> &nbsp;</div>
    <div id='mmenusubbar'> &nbsp;</div>
    <div id='mmenusubsubbar'> &nbsp;</div>
    <br />
    <br />


    <div>
        <div style="text-align: right; font-style: italic;font-size: 11pt">
            <?php
                echo "Olá, " . $session->get('nome');

            //rever como passar estes dados aqui
                $id_evento = 1;
                $id_curso = $session->get('curso');
            ?>
            </div>
        <br />
        <form id='cad_usuario' name='usuario' method='post' action='confirma.php' >
            <p align='center'><b>Marque as atividades que deseja participar</b></p>
            <div>
                <article>
                    <p><strong>Palestras:</strong></p>
                    <?php
                    $id_tipo = 1;
                    foreach($bd->listarAtividade($id_evento,$id_tipo,$id_curso) as $row){
                        $meuhtml = "<input type='checkbox' name='vetativ[]' id='vetativ[]' value='";
                        $palestras = $row['dia'] . ' '. $row['horario'] . ' ' . $row['palestrante'] . ' ' . $row['palestra'];
                        $meuhtml = $meuhtml . "{$palestras}'>{$palestras}<br>";
                        echo $meuhtml;
                    }
                    ?>
                </article>
                <article>
                    <p><strong>Oficinas:</strong></p>
                    <?php
                    $id_tipo = 2;
                    foreach($bd->listarAtividade($id_evento,$id_tipo,$id_curso) as $row){
                        $meuhtml = "<input type='checkbox' name='vetativ[]' id='vetativ[]' value='";
                        $palestras = $row['dia'] . ' '. $row['horario'] . ' ' . $row['palestrante'] . ' ' . $row['palestra'];
                        $meuhtml = $meuhtml . "{$palestras}'>{$palestras}<br>";
                        echo $meuhtml;
                    }
                    ?>
                </article>
                <article>
                    <p><strong>Mini-cursos:</strong></p>
                    <?php
                    $id_tipo = 3;
                    foreach($bd->listarAtividade($id_evento,$id_tipo,$id_curso) as $row){
                        $meuhtml = "<input type='checkbox' name='vetativ[]' id='vetativ[]' value='";
                        $palestras = $row['dia'] . ' '. $row['horario'] . ' ' . $row['palestrante'] . ' ' . $row['palestra'];
                        $meuhtml = $meuhtml . "{$palestras}'>{$palestras}<br>";
                        echo $meuhtml;
                    }
                    ?>
                </article>
                <article>
                    <p><strong>Comunicação Oral:</strong></p>
                    <?php
                    $id_tipo = 4;
                    foreach($bd->listarAtividade($id_evento,$id_tipo,$id_curso) as $row){
                        $meuhtml = "<input type='checkbox' name='vetativ[]' id='vetativ[]' value='";
                        $palestras = $row['dia'] . ' '. $row['horario'] . ' ' . $row['palestrante'] . ' ' . $row['palestra'];
                        $meuhtml = $meuhtml . "{$palestras}'>{$palestras}<br>";
                        echo $meuhtml;
                    }
                    ?>
                </article>
            </div><br />
            <div button type="button" class="btn btn-default" aria-label="Left Align">
                <center><input name='proximo' style='width:30%;' type='submit' id='proximo' value='Confirmar Atividades' /></center>
            </div>
        </form>
    </div>
    <br />

    <div id="rodape">
        <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
    </div>
</div>
</body>
</html>