<?php

    header('Content-Type: text/html; charset=UTF-8');

    require_once("../cfg/Session.php");
    $session = new Session("EventosAsser2016");

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

    <script src="../html/scripts/notify.min.js"></script>



    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../html/css/menu-styles.css" type="text/css">
    <link rel="stylesheet" href="../html/css/estilo.css" type="text/css">
    <script src="../html/scripts/asser-main-menu.js"></script>

    <script type="text/javascript">
        // callback (usado para chamar via POST o listar participante com todos autores)
        // 1. retorna uma lista de autores
        $(function() {
            $( "#dados" ).load( "lista_participante_service.php", { }, function() {
                console.log('Lista de participantes carregada com sucesso!');
            });

            $("#info-pagamento").css({display: 'none'});
            $("#texto").css(  {display: 'block'});
            $('#rodape').css( {display: 'block'});

            $("#validatepayment").click(function(){

                $( "#dialog-confirm" ).dialog({
                    resizable: false,
                    height: "auto",
                    width: 400,
                    modal: true,
                    buttons: {
                        "Sim": function() {

                            var emailField = document.getElementById('pagemail');
                            $.post("pag_confirma_controller.php",
                                { "email": emailField.innerHTML },
                                function(data,status){
                                    var json = jQuery.parseJSON(data);
                                    if(json.status === 100) {
                                        $.notify("Inscrição realizada com sucesso!", "success");
                                        setTimeout( function(){window.location = window.location.href} , 1250);
                                    }else if(json.status === 200){
                                        $.notify("Problemas ao realizar a inscrição!");
                                    }else
                                        $.notify('Erro inesperado!');
                                });
                            $( this ).dialog( "close" );

                        },
                        "Cancelar": function() {
                            $( this ).dialog( "close" );
                        }
                    }
                });/*close dialog*/
              });

        });


        function fmtCurrentDate() {
            var d = new Date();

            var curr_day    = d.getDate();
            var curr_month  = d.getMonth() + 1;
            var curr_year   = d.getFullYear();
            var dateFmt     = curr_day + "/" + curr_month + "/" + curr_year
            return dateFmt;
        }
        function fmtCurrencyForPayment() {
            return 'R$ 20,00';
        }

        function searchEmailOnJsonList() {
            // 2. evento para o botao de busca da tabela
            // quando clicado, faz a busca no array via JS e
            // mostra a mensagem se o login existe ou não
            // renderiza na mesma tela a informação do usuario (nome do participante)
            // para confirmar a inscrição


            if( $("#dados").length!=1 ) {
                console.log('A lista de autores está vazia!');
                throw 'ListaAutoresVaziaException';
                return;
            }

            var emailField = document.getElementById('email');

            var $dados    = $("#dados")[0].innerHTML;
            var json      = jQuery.parseJSON($dados);
            var foundId   = false;

            $.each(json, function(i, item) {
                if(emailField.value == item.email){

                    foundId = true;

                    $.notify("Participante encontrado com sucesso!", "success");
                    $("#info-pagamento").css({display:  'block'});
                    $("#info-pagamento").css({position: 'relative'});
                    $("#info-pagamento").css('margin-top', -150);
                    $("#texto").css({display: 'none'});

                    $('#nome').text(item.nome);
                    $('#pagemail').text(item.email);
                    $('#curso').text(item.nome_curso);
                    $('#data_pagamento').text(fmtCurrentDate());
                    $('#valor').text(fmtCurrencyForPayment());

                    return false;
                }else{
                    foundId 	= false;
                    $("#info-pagamento").css({display: 'none'});
                    $("#texto").css({display: 'block'});
                }

            });

            if(!foundId){
                console.log('Não foi encontrado o email no banco de dados!');
                console.log('Email -> ' + emailField.value);
                $.notify("Não há inscrição para ser feita para esse e-mail!", "warn");
            }

        }


    </script>

</head>
<body>
<div style="display: none;" id="dialog-confirm" title="Confirmação">
    <p style="margin-top: 15px "> Confirma o pagamento da inscrição ? </p>
</div>

<div id="dados" style="display: none"></div>

<div id="corpo">

    <div id="cabecalho">
    </div>

    <br />

    <div id='cssmenu'>
        <ul>
            <li class='active'><a href='#'>Inscrição no evento</a></li>
        </ul>
    </div>

    <div id="mmenu"> &nbsp;</div>
    <div id="mmenubar"> &nbsp;</div>
    <div id="mmenusubbar"> &nbsp;</div>
    <div id="mmenusubsubbar"> &nbsp;</div>

    <span id="small-button-class" class="small-button-back-class" onclick="javascript:location.href='secretaria_perfil.php'"> voltar </span>



    <div style="padding: 50px; margin-bottom: 50px; height: 45px;">
        <div id="texto" >
            <fieldset style="background-color: #e6EEEE; width: 80%">
                <form id="lista-resumos"
                      name="secretaria" method="post"
                      action="pag_confirma_controller.php"  novalidate="novalidate">
                    <div class="text-align-center">
                        <br/>
                        <div class="text-align-center" style="height: 35px;"><strong>Entre com o e-mail do inscrito</strong></div>
                        <div class="text-align-center" style="height: 35px;"><input type="text" id="email" name="email" size="50"></div>
                        <div class="text-align-center">
                            <input class="button button-center" name="resumo" type="button" id="search" value="Buscar" onclick="searchEmailOnJsonList();"/>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>

    </div>
    <div id="info-pagamento">
        <div class="message-payment-success">

            <div class="message-payment-detail">
                <strong> <p> Confirmação do pagamento pela secretaria </p> </strong>
            </div>

            <div> Nome completo: <div style="display: inline-block; color: #0F0F0F" id="nome" ></div> </div>
            <div> E-mail: <div style="display: inline-block; color: #0F0F0F" id="pagemail" ></div> </div>
            <div> Curso: <div style="display: inline-block; color: #0F0F0F" id="curso" /></div>  </div>

            <div> Data do pagamento: <div style="display: inline-block; color: #0F0F0F" id="data_pagamento" /> </div> </div>
            <div> Valor: <div style="display: inline-block; color: #0F0F0F" id="valor" /> </div> </div>
        </div>
        <div class="text-align-center">
            <input class="button button-center" name="resumo" type="button" id="validatepayment" value="Clque para validar pagamento" />
        </div>
    </div>

    <div id="rodape">
        <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
    </div>

</div>

</body>
</html>
