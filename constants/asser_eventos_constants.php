<?php
    //
    // Constantes usadas para as tabelas

    // define as constantes para as operacoes de revisao do resumo
    define('RESUMO_STATUS_ENVIADO',  0);
    define('RESUMO_STATUS_APROVADO', 1);
    define('RESUMO_STATUS_REENVIAR', 2);
    define('RESUMO_STATUS_REPROVADO',3);
    define('RESUMO_STATUS_CORRIGIDO',4);
    define('RESUMO_STATUS_EDITADO' , 5);


    // define o id do evento atual
    define('ID_EVENTO_ATUAL',       3);

    // define os status para as operacoes de CRUD
    define('STATUS_ATUALIZACAO_INSERT', 'I');
    define('STATUS_ATUALIZACAO_DELETE', 'D');
    define('STATUS_ATUALIZACAO_UPDATE', 'U');
    define('STATUS_ATUALIZACAO_OTHER',  'X');
    define('STATUS_ATUALIZACAO_REVISAR',  'R');
    define('STATUS_ATUALIZACAO_REVISADO', 'O');

    //
    // para controle de sessao
    define('SESSION_KEY_ID_CURSO',  'idCurso');
    define('SESSION_KEY_EMAIL',     'email');
    define('SESSION_KEY_NOME',      'nome');
    define('SESSION_KEY_SENHA',     'senha');
    define('SESSION_MESSAGE_ERROR', 'message_error');
    define('SESSION_ERROR_CODE',    'error_code');
    define('SESSION_REQUEST_DATA',  'request_data');

    define('SESSION_KEY_LOGIN_ACADEMIC',    'login_academico');
    define('SESSION_KEY_PASSWORD_ACADEMIC', 'password_academico');
    define('SESSION_KEY_TYPE_ACADEMIC',     'funcao_academico');
    define('SESSION_KEY_NAME_ACADEMIC',     'nome_academico');

    //
    // Constantes usadas para tratamento de log

    define('ERROR_CODE_EMAIL_EXISTING', 500);
    define('ERROR_CODE_GENERAL',        501);

    define('SUCCESS_PROCESS_STATUS',    100);
    define('ERROR_PROCESS_STATUS',      200);

    //
    // Ids dos Eventos que serao desabilitados na listagem de participantes
    // e avaliacao de professores

    const EVENTS_DISABLE = "1:2:100";
