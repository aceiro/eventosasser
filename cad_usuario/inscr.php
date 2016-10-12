<?php
    require_once("../cfg/Session.php");
    $session = new Session("EventosAsser2016");
    error_reporting(0);
    $session->set('nome',addslashes($_POST['nome']));
    $session->set('email',addslashes($_POST['email']));
    $session->set('senha',addslashes($_POST['password']));
    $session->set('curso',addslashes($_POST['curso']));

    require_once("../cfg/BD.php");
    $bd = new BD();
    //validar usuário se já cadastrado mostrar as opções, se não
    //cadastrá-lo
    $bd->cadastraAluno();
    header("Content-Type: text/html; charset=UTF-8", true);
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
                    email: "Escreva seu endereço de email corretamente",
                    tipo: "Escolha um tipo de participação",
                    password: {
                        required: "Por favor, digite uma senha",
                        minlength: "Sua senha deve ter mais de 5 caracteres"
                    },
                    password1: {
                        required: "Por favor, digite uma senha",
                        minlength: "Sua senha deve ter mais de 5 caracteres"
                    }
                },

                submitHandler: function(form) {
                    senha = document.getElementById('password');
                    senhaRepetida = document.getElementById('password1');
                    if (senha != senhaRepetida){
                        alert("Repita a senha corretamente");
                        document.getElementById('password1').focus();
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
                <legend style="background-color: white">Enviar Resumo</legend>
                <form id="register-form"
                      name="register-form" method="post"
                      action="cad_resumo.php"  novalidate="novalidate">
                    <div class="text-align-center">
                        <div style="height: 50px">Cadastrar dados do resumo</div>
                        <input class="button button-center" name="resumo" type="submit" id="resumo" value="Cadastrar" />
                    </div>
                </form>
            </fieldset>
        </div>
        <div style="height: 150px; width: 33%; float: left;">
            <fieldset style="background-color: #e6EEEE; width: 80%">
                <legend style="background-color: white">Co-autor de Resumo</legend>
                <form id="register-form"
                      name="register-form" method="post"
                      action="coautor.php"  novalidate="novalidate">
                    <div style="height: 50px">Associar-se a um resumo enviado</div>
                    <div class="text-align-center">
                        <input class="button button-center" name="resumo" type="submit" id="resumo" value="Associar" />
                    </div>
                </form>
            </fieldset>
        </div>
        <div style="height: 150px; width: 33%; float: left;">
            <fieldset style="background-color: #e6EEEE; width: 80%">
                <legend style="background-color: white">Inscrição em Atividades</legend>
                <form id="register-form"
                      name="register-form" method="post"
                      action="../palestra/atividades.php"  novalidate="novalidate">
                    <div style="height: 50px">Inscrever-se em palestras</div>
                    <div class="text-align-center">
                        <input class="button button-center" name="resumo" type="submit" id="resumo" value="Increver" />
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
