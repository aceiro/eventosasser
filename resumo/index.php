
<!DOCTYPE html >
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <link rel="shortcut icon" href="../favicon.ico">
    <title>Asser Eventos</title>
    <!-- adicionado o suporte para o jquery e thema redmond -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- outros suporte a css da página -->
    <link rel="stylesheet" href="../html/css/menu-styles-v1.0.0.css" type="text/css">
    <link rel="stylesheet" href="../html/css/commun-style-v1.0.0.css" type="text/css">
    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../html/scripts/asser-main-menu.js"></script>
    <script src="../html/scripts/asser-commum.js"></script>

    <style>
        .recupera-senha-class{
            text-decoration: none;
            border-radius: 2px;

            text-align: center;
            background-color: #6be26c;
            padding: 10px;
            margin: 10px 300px 10px 300px;
        }
        .recupera-senha-class a{
            color: #FFFFFF;
        }
    </style>

</head>
<body>
<div id="corpo">

    <div id="cabecalho">
    </div>


    <div id='cssmenu'>
        <ul>
            <li><a href='../index.html'>Evento</a></li>
            <li class='active'><a href='#'>Inscrição</a></li>
            <li><a href='../modelos'>Modelos</a></li>
            <li><a href='../programa.html'>Programação</a></li>
            <li> <a href='../anais'>Edições Anteriores</a></li>
            <li><a href='../comissao.html'>Comissão</a></li>
            <li><a href='../ajuda'>Ajuda</a></li>
            <li><a href='../contato'>Contato</a></li>
        </ul>
    </div>

    <div id="mmenu"> &nbsp;</div>
    <div id="mmenubar"> &nbsp;</div>
    <div id="mmenusubbar"> &nbsp;</div>
    <div id="mmenusubsubbar"> &nbsp;</div>
    <div style="padding: 50px; margin-bottom: 50px; height: 100px;">

        <div style="height: 150px; width: 45%; float: left;">

            <fieldset style="width: 80%;padding-top: 5px;border-top-width: 0.8;margin-top: 10px;height: 150px;">
                <form id="register-form"
                      name="register-form" method="post"
                      action="novo_participante.php"  novalidate="novalidate">
                    <div class="text-align-center">
                        <br/>
                        <div><img src="../imagens/user-icon-01.png" height="70px" width="70px"></div>
                        <div class="text-align-center-btn-access">
                            <input disabled class="button button-center" name="resumo" type="submit" id="resumo" value="Criar usuário" />
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
        <div class="rotulo-resumo" style="float: left; padding-top: 60px">
            <img  src="" height="80px" />  <br />
            OU <br />
            <img src="" height="90px" />
        </div>
        <div style="height: 150px; width: 45%; float: left;">
            <fieldset style="width: 80%;padding-top: 5px;border-top-width: 0.8;margin-top: 10px;height: 150px;">
                <form id="register-form"
                      name="register-form" method="post"
                      action="login.php"  novalidate="novalidate">
                    <div class="text-align-center">
                        <br/>
                        <div><img src="../imagens/access_key-512.png" height="70px" width="70px"></div>
                        <div class="text-align-center-btn-access">
                            <input class="button button-center" name="resumo" type="submit" id="resumo" value="Fazer login" />
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