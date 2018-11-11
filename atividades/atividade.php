<?php
//require_once("../constants/asser_eventos_constants.php");
//require_once("../cfg/Session.php");
//require_once '../repositorio/facade/EventosAsserFacade.php';
function listarAtividadeCad(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=backup_20062016', 'root', '123456');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM palestraa WHERE ano = 2016 ORDER BY dia";
        return $pdo->query($sql);

    }catch(PDOException $e){
        echo "ERROR" . $e->getMessage();
    }
}

//$session = new Session(SESSION_SERVER_ID);

//$atividadesRepository   = EventosAsserFacade::createAtividadesRepository();
//$participanteRepository = EventosAsserFacade::createParticipanteRepository();

//$participante = $participanteRepository->findParticipanteByEmail($session->get(SESSION_KEY_EMAIL));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="cache-control" content="no-store"/>
    <link rel="shortcut icon" href="favicon.ico">

    <title>Asser Eventos</title>

    <link rel="stylesheet" href="../html/scripts/chosen_v1.8.2/docsupport/style.css">
    <link rel="stylesheet" href="../html/scripts/chosen_v1.8.2/docsupport/prism.css">
    <link rel="stylesheet" href="../html/scripts/chosen_v1.8.2/chosen.css">
    <link rel="stylesheet" href="../html/css/menu-styles-v1.0.0.css" type="text/css">
    <link rel="stylesheet" href="../html/css/commun-style-v1.0.0.css" type="text/css">

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="../html/scripts/asser-main-menu.js"></script>
    <script src="../html/scripts/notify.min.js"></script>


</head>
<body>

<div id="corpo">

    <div id="cabecalho">
    </div>

    <br/>

    <div id='cssmenu'>
        <ul>
            <li class='active'><a href='#'>Inscrição</a></li>
            <li><a target="_blank" href='Programacao-Geral-Final-2018v2.pdf' >Programação 2018</a></li>
        </ul>
    </div>

    <div id="mmenu" style="height:3px;"> &nbsp;</div>
    <div id="mmenubar" style="height:3px;"> &nbsp;</div>
    <div id="mmenusubbar" style="height:2px;"> &nbsp;</div>
    <div id="mmenusubsubbar" style="height:2px;"> &nbsp;</div>

    <br/>

    <span id="small-button-class" class="small-button-back-class" onclick="javascript:location.href='../resumo/perfil.php'"> voltar </span>

    <form id="multi-select-form" method="post" action="confirma_atividades.php">


                <div>

                    <h2>Atividades disponíveis na mostra</h2>
					<h3>Marque as caixinhas das atividades que deseja participar:</h3>
					<div class="form-group">
                        <table class="table">
                            <thead>
                            <tr><th>x</th><th>Atividade</th><th>Palestra</th><th>Dia</th><th>Hora</th></tr>
                            </thead>
                        <?php
                            foreach (listarAtividadeCad() as $row)
                            {
                                echo '<div class="form-check">';
                                echo '<tr><td><input type="checkbox" class="form-check-input" id="cursos" name="cursos" value="'.$row['id'].'"></td>';
                                echo '<td>'.$row['tipo'].'</td><td>'.$row['palestra'].'</td><td>'.$row['dia'].'</td><td>'.$row['horario'].'</td></tr>';
                                echo '</div>';
                            }
                        ?>
                        </table>
						<div class="text-align-center">
							<input class="button button-center" id="cad-btn" name="cadastrar" type="button" value="Confirmar"/>
						</div>
                    </div>

        </div>
    </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js" type="text/javascript"></script>
        <script src="../html/scripts/chosen_v1.8.2/chosen.jquery.js" type="text/javascript"></script>
        <script src="../html/scripts/chosen_v1.8.2/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
        <script src="../html/scripts/chosen_v1.8.2/docsupport/init.js" type="text/javascript" charset="utf-8"></script>




</div>

</body>
</html>