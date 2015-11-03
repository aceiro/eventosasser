<?php

$nome = $_POST["nome"];
$email = $_POST["email"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];


mail("mostra-cientifica-asser@bol.com.br","$assunto","Nome:$nome\n Email:$email\n Mensagem:$mensagem\n","De:$nome<$email>");
?>
<script language="javascript">
alert("E-mail enviado!"); 
</script>
<?php
echo "<meta http-equiv=\"refresh\" content=\"0;url=contato.html>";
?>