<?php

    header('Content-Type: text/html; charset=UTF-8');

    require_once("../constants/asser_eventos_constants.php");
    require_once("../cfg/Session.php");
    $session = new Session(SESSION_SERVER_ID);

?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <link rel="shortcut icon" href="../favicon.ico">
    <title>Asser Eventos</title>
    <!-- adicionado o suporte para o jquery e thema redmond -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- outros suporte a css da p�gina -->
    <link rel="stylesheet" href="../html/css/menu-styles.css" type="text/css">
    <link rel="stylesheet" href="../html/css/commun-style-v1.0.0.css" type="text/css">
    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../html/scripts/asser-main-menu.js"></script>
    <script src="../html/scripts/asser-commum.js"></script>
    <script src="../html/scripts/notify.min.js"></script>


    <script type="application/javascript">
        $(document).ready(function(){

            $("#cadastro-resumo-button").notify(
                "Clique aqui para enviar o seu resumo como autor principal. \n Inclua também outros autores",
                { position:"top left",
                  className:"success",
                   showDuration: 500
                }

            )
        });

    </script>

</head>
<body>
<div id="corpo">

    <div id="cabecalho">
    </div>

    <br />

    <div id='cssmenu'>
        <ul>
            <li class='active'><a href='#'>Inscrição no evento</a></li>
            <!-- <li><a target="_blank" href='../atividades/Programacao-Geral-2017.pdf' >Programação 2018</a></li> !-->
        </ul>
    </div>

    <div id="mmenu"> &nbsp;</div>
    <div id="mmenubar"> &nbsp;</div>
    <div id="mmenusubbar"> &nbsp;</div>
    <div id="mmenusubsubbar"> &nbsp;</div>
    <div class="welcome-login">
        <?php echo trim("Bem vindo, " . explode(" ", $session->get(SESSION_KEY_NOME))[0] . " !") ;?>
        <span id="small-button-class" class="small-button-class" onclick="javascript:location.href='logout.php'"> Sair </span>
    </div>
    <div style="padding: 50px; margin-bottom: 50px; height: 300px;">
        <div id="cadastro_resumo" style="height: 150px; width: 33%; float: left;">
            <fieldset style="background-color: #e6EEEE; width: 80%">
                <form id="cadastro-resumo"
                      name="cadastro-resumo" method="post"
                      action="cadastro_resumo.php"  novalidate="novalidate">
                    <div class="text-align-center">
                        <br/>
                        <div><img src="../imagens/articles.png" height="70px" width="70px"></div>
                        <input class="button button-center" name="resumo" type="submit" id="cadastro-resumo-button" value="Cadastrar Resumo" />
                    </div>
                </form>
            </fieldset>
        </div>
        <div style="height: 150px; width: 33%; float: left;">
            <fieldset style="background-color: #e6EEEE; width: 80%">
                <form id="lista-resumos"
                      name="lista-resumos" method="post"
                      action="../relatorios/lista_resumos_x_participantes.php"  novalidate="novalidate">
                    <div class="text-align-center">
                        <br/>
                        <div><img src="../imagens/clipboard-list-flat.png" height="70px" width="70px"></div>
                        <div class="text-align-center">
                            <input class="button button-center" name="resumo" type="submit" id="resumo" value="Listar Resumos" />
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
        <div style="height: 150px; width: 33%; float: left;">
            <fieldset style="background-color: #e6EEEE; width: 80%">
                <form id="register-form"
                      name="register-form" method="post"
                      novalidate="novalidate" action="../atividades/index.php">
                    <div class="text-align-center">
                        <br/>
                        <div><img src="../imagens/interview_icon.png" height="70px" width="70px"></div>
                        <div class="text-align-center">
                            <input class="button button-center" disabled name="resumo" type="submit" id="resumo" value="Inscrição em Atividades" />
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>

        <div style="height: 150px;width: 33%;float: left;padding-top: 40px;">
            <fieldset style="background-color: #e6EEEE; width: 80%">
                <form id="confirma_pagamento"
                      name="confirma_pagamento" method="post"
                      novalidate="novalidate"
                      action="../inscricao/confirma_pagamento_controller.php">
                    <div class="text-align-center">
                        <br/>
                        <div><img src="../imagens/payment.png" height="70px" width="70px"></div>
                        <div class="text-align-center">
                            <input class="button button-center" name="resumo" type="submit" id="resumo" value="Status do Pagamento" />
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>

        <div style="height: 150px;width: 33%;float: left;padding-top: 40px;">
            <fieldset style="background-color: #e6EEEE; width: 80%">
                <form id="gerar_certificado"
                      name="gerar_certificado" method="post"
                      novalidate="novalidate"
                      action="../certificados/gerar_certificado_controller.php?e='<?php echo base64_encode($session->get(SESSION_KEY_EMAIL));?>'">
                    <div class="text-align-center">
                        <br/>
                        <div><img src="../imagens/certificate-flat.png" height="70px" width="70px"></div>
                        <div class="text-align-center">
                            <input class="button button-center" name="resumo" type="submit" id="resumo" value="Gerar Certificado" />
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>

    </div>

    <div id="rodape">
        <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
    </div>
</div>
</body>
</html>