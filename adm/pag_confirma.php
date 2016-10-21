<?php
    require_once("../cfg/Session.php");
    $session = new Session("EventosAsser2016");

//registra pagamento
//função repositório update por email
//caso ok registra msg em session com "pagamento confirmado" e grava nome do aluno inscrito na session
    $session->set('msg','Pagamento Confirmado');
    $session->set('inscrito','Cristiano teste');
//caso contrário registra msg em session "email não encontrado usuario não cadastrado"


    header("location:pg_final.php");