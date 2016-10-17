<?php
    //
    // Constantes usadas para as tabelas
    define('ENVIADO',  0);
    define('APROVADO', 1);
    define('REENVIAR', 2);
    define('REPROVADO',3);
    define('CORRIGIDO',4);


    //
    // Templates
    define('ROW_TEMPLATE','<tr></tr><td>{ID}</td><td>{TITULO}</td><td>{AUTOR}</td><td>{STATUS}</td></tr>');