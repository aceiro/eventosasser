<?php

$pdo = new PDO('mysql:host=localhost;dbname=backup_20062016', 'root', '123456');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

foreach ($_POST['cursos'] as $row)
$sql = "INSERT INTO palestrass (ra,nome,palestra,pago,presenca,ano,semestre) VALUES ('{$session->get('ra')}','{$session->get('nome')}',".$row['id'].",'0',0,'2016','1sem')";
$pdo->query($sql);

