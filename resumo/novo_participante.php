<?php
    require '../repositorio/models/Curso.php';
    require '../repositorio/facade/EventosAsserFacade.php';
    $cursoRepository = EventosAsserFacade::createCursoRepository();

    header('Content-Type: text/html; charset=UTF-8');

?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <link rel="shortcut icon" href="../favicon.ico">
    <title>Asser Eventos</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


    <link rel="stylesheet" href="../html/css/menu-styles.css" type="text/css">
    <link rel="stylesheet" href="../html/css/commun-style-v1.0.0.css" type="text/css">
    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../html/scripts/asser-main-menu.js"></script>
    <script src="../html/scripts/asser-commum.js"></script>
    <script>

        $(function() {
            document.getElementById("resenha-error").style.display = 'none';
            $("#register-form").validate({
                rules: {
                    nome: "required",
                    curso: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    senha: {
                        required: true,
                        minlength: 5
                    },
                    resenha: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    nome: "Nome requerido",
                    email: "E-mail requerido",
                    senha: {
                        required: "Senha requerida",
                        minlength: "A senha deve ter mais de 5 caracteres"
                    },
                    resenha: {
                        required: "Confirmação de senha requerida",
                        minlength: "A senha deve ter mais de 5 caracteres"
                    }
                },

                submitHandler: function(form) {

                    $("#dialog-confirm").dialog({
                        resizable: false,
                        height: "auto",
                        width: 400,
                        modal: true,
                        buttons: {
                            "Sim": function () {
                                senha         = document.getElementById('senha');
                                senhaRepetida = document.getElementById('resenha');
                                if (senha.value != senhaRepetida.value){
                                    document.getElementById('resenha').focus();
                                    document.getElementById("resenha-error").style.display = 'block';
                                    return false;
                                }
                                form.submit();

                                $(this).dialog("close");

                            },
                            "Cancelar": function () {
                                $(this).dialog("close");
                            }
                        }
                    });
                    /*close dialog*/
                }
            });
        });



    </script>
</head>
<body>
<div style="display: none; font-size: inherit;" id="dialog-confirm" title="Confirmação">
    <p style="margin-top: 15px "> Confirma a inscrição ? </p>
</div>

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
    <br />

    <br />

    <div id="texto">
        <form id="register-form"
              name="register-form" method="post"
              action="inscricao_controller.php"  novalidate="novalidate">

            <fieldset>
                <legend>Inscrição no Evento</legend>
                <div>
                    <label> Nome:</label>
                    <input type="text" id="nome" name="nome" size="50" maxlength="65"  />
                </div>

                <div>
                    <label>E-mail:</label>
                    <input type="text" id="email" name="email" size="50" maxlength="65"/>
                </div>

                <div>
                    <label>Senha:</label>
                    <input type="password" id="senha" name="senha" size="50" />
                </div>

                <div>
                    <label>Confirme sua Senha:</label>
                    <input type="password" id="resenha" name="resenha" size="50" />
                    <label id="resenha-error" for="resenha" class="error">As senhas não conferem</label>
                </div>

                <div>
                    <label>Curso:</label>
                    <select id="curso" name="curso">
                        <?php
                            $str = "";

                            foreach($cursoRepository->findAll() as $row) {
                                $str .= "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                            }
                            echo $str;
                        ?>
                    </select>
                </div>

            </fieldset>
            <div class="text-align-center">
                <input class="button button-center" name="cadastrar" type="submit" id="cadastrar" value="Enviar" />
                <input class="button button-center" name="limpar" type="reset" id="limpar" value="Limpar" />
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