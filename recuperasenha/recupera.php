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
    <link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../scripts/asser-main-menu.js"></script>
    <script src="../scripts/asser-commum.js"></script>

</head>
<body>
<div id="corpo">

    <div id="cabecalho">
    </div>

    <br />

    <div id='cssmenu'>
        <ul>
            <li><a href='../index.html'>Evento</a></li>
            <li class='active'><a href='#'>Inscrição no evento</a></li>
            <li><a href='../modelos'>Modelos</a></li>
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
    <div style="padding: 50px; margin-bottom: 15px; height: 125px;">
	<form name="frmreset" id="frmreset" method="POST" action="reset.php">
		<div class="text-align-center" style="margin-bottom: 25px">
			<strong>Email cadastrado:</strong><br />
			<input type="text" id="email" name="email" size="50" placeholder="Digite seu email aqui" size="65" value="<?php echo $_GET['email']; ?>">
		</div>

		<div class="text-align-center" style="margin-bottom: 25px">
			<strong>Nova senha</strong> <code><br />(máximo 8 caracteres)</code>:<br />
			<input type="password" id="senha" name="senha">
		</div>
		
		<div class="text-align-center">
			<strong>Confirme a nova senha:</strong><br />
			<input type="password" id="senha1" name="senha1">
		</div>

        <div class="text-align-center-btn-access">
            <input class="button button-center" name="recovery" type="submit" id="recovery" value="Renovar Senha" />
        </div>
	<form>
 </div>

    <div id="rodape">
        <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
    </div>
</div>
</body>
</html>