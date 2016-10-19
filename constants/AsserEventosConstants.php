<?php
    //
    // Constantes usadas para as tabelas

    define('RESUMO_STATUS_ENVIADO',  0);
    define('RESUMO_STATUS_APROVADO', 1);
    define('RESUMO_STATUS_REENVIAR', 2);
    define('RESUMO_STATUS_REPROVADO',3);
    define('RESUMO_STATUS_CORRIGIDO',4);

    define('ID_EVENTO_ATUAL',       1);
    define('STATUS_ATUALIZACAO_INSERT', 'I');
    define('STATUS_ATUALIZACAO_DELETE', 'D');
    define('STATUS_ATUALIZACAO_UPDATE', 'U');
    define('STATUS_ATUALIZACAO_OTHER',  'X');

    //
    // Para controle de sessão
    define('SESSION_KEY_ID_CURSO',  'idCurso');
    define('SESSION_KEY_EMAIL',     'email');
    define('SESSION_KEY_NOME',      'nome');
    define('SESSION_KEY_SENHA',     'senha');
    define('SESSION_MESSAGE_ERROR', 'message_error');
    define('SESSION_ERROR_CODE',    'error_code');
    define('SESSION_REQUEST_DATA',  'request_data');

    //
    // Constantes usadas para tratamento de log

    define('ERROR_CODE_EMAIL_EXISTING', 500);
    define('ERROR_CODE_GENERAL',        501);

    define('SUCCESS_PROCESS_STATUS',    100);
    define('ERROR_PROCESS_STATUS',      200);