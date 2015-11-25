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


