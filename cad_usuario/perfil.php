<?php
    require_once("../cfg/Session.php");
    $session = new Session("EventosAsser2016");
header('Content-Type: text/html; charset=UTF-8');
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
    <link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../scripts/asser-main-menu.js"></script>
    <script src="../scripts/asser-commum.js"></script>
    <script>
        $(function() {
            $("#register-form").validate({
                rules: {
                    nome: "required",
                    curso: "required",
                    tipo: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    nome: "Escreva o seu nome completo",
                    email: "Escreva seu endere�o de email corretamente",
                    tipo: "Escolha um tipo de participa��o",
                    senha: {
                        required: "Por favor, digite uma senha",
                        minlength: "Sua senha deve ter mais de 5 caracteres"
                    },
                    resenha: {
                        required: "Por favor, digite uma senha",
                        minlength: "Sua senha deve ter mais de 5 caracteres"
                    }
                },

                submitHandler: function(form) {
                    senha = document.getElementById('senha');
                    senhaRepetida = document.getElementById('resenha');
                    if (senha != senhaRepetida){
                        alert("Repita a senha corretamente");
                        document.getElementById('resenha').focus();
                        return false;
                        form.submit();
                    }
                });
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
            <li><a href='../index.html'>Evento</a></li>
            <li class='active'><a href='../index.html'>Inscrição no evento</a></li>
            <li><a href='../programa.html'>Programação</a></li>
            <li> <a href='../anais'>Edições<br>Anteriores</a></li>
            <li><a href='../contato'>Contato</a></li>
            <li><a href='../creditos.html'>Créditos</a></li>
        </ul>
    </div>

    <div id="mmenu"> &nbsp;</div>
    <div id="mmenubar"> &nbsp;</div>
    <div id="mmenusubbar"> &nbsp;</div>
    <div id="mmenusubsubbar"> &nbsp;</div>
    <div style="text-align: right"><?php echo "Olá " . $session->get('nome');?></div>
    <div style="padding: 50px; margin-bottom: 50px; height: 100px;">
        <div style="height: 150px; width: 33%; float: left;">
            <fieldset style="background-color: #e6EEEE; width: 80%">
                <form id="register-form"
                      name="register-form" method="post"
                      action="cad_resumo.php"  novalidate="novalidate">
                    <div class="text-align-center">
                        <br/>
                        <div><img src="../imagens/articles.png" height="70px" width="70px"></div>
                        <input class="button button-center" name="resumo" type="submit" id="resumo" value="Cadastrar Resumo" />
                    </div>
                </form>
            </fieldset>
        </div>
        <div style="height: 150px; width: 33%; float: left;">
            <fieldset style="background-color: #e6EEEE; width: 80%">
                <form id="register-form"
                      name="register-form" method="post"
                      action="listagem_resumos_autor.php"  novalidate="novalidate">
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
                      action="../palestra/atividades.php"  novalidate="novalidate">
                    <div class="text-align-center">
                        <br/>
                        <div><img src="../imagens/assistir_atividade.jpg" height="70px" width="70px"></div>
                        <div class="text-align-center">
                            <input class="button button-center" name="resumo" type="submit" id="resumo" value="Increver-se em Atividade" />
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>

    <div id="rodape">
        <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 � 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informa��o </a> </p>
    </div>
</div>
</body>
</html>