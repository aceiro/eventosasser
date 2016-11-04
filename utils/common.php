<?php
    function isEmpty($input){
        $strTemp = $input;
        $strTemp = trim($strTemp); // trimming the string

        if( $strTemp == null       ||
            $strTemp == ''         ||
            strlen($strTemp) == 0  ) {
            return true;
            }
        return false;
    }

    function buildSimpleRowStatus($status=-1){
        $result = '';
        switch($status){
            case 0:{
                $result="<span class=\"glyphicon glyphicon-list-alt\"></span><br/> Enviado";
                break;
            }
            case 1:{
                $result="<span class=\" glyphicon glyphicon-ok-circle\"></span><br/>Aprovado";
                break;
            }
            case 2:{
                $result="<span class=\" glyphicon glyphicon-ban-circle\"></span><br/>Re-enviar";
                break;
            }
            case 3:{
                $result="<span class=\" glyphicon glyphicon-remove-circle\"></span><br/>Reprovado";
                break;
            }
            default:{
                $result="-";
                break;
            }
        }
        return $result;
    }



    function fmtBrazilianMoney($value){

        return 'R$ ' . number_format($value, 2,',','.');
    }

