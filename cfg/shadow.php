<?php

    function minutum($key){
        list($dec1, $dec2) = explode(":", base64_decode(base64_decode(base64_decode($key))));
        if( $dec1 == '' ||
            $dec2 == '' || $dec2 != '0DF153E407074B9504EE7812A92C7D1BB60DCADFECD9F64BE86FF20796C07723' ||
            md5( $dec2 ) != '54e68553e51331c887521ddf82d0232b') die("Ratio procedere possit rogatus");
        return $dec1;
    }

    return array(
        'u'  => 'WTIwNWRtUkViM2RTUlZsNFRsUk9SazVFUVROTlJHTXdVV3ByTVUxRVVrWlNWR00wVFZSS1FrOVVTa1JPTUZGNFVXdEpNazFGVWtSUlZWSkhVbFZPUlU5VldUSk9SVXBHVDBSYVIxSnFTWGRPZW1zeVVYcEJNMDU2U1hvPQ==',
        'p'  => 'VFZSSmVrNUViM2RTUlZsNFRsUk9SazVFUVROTlJHTXdVV3ByTVUxRVVrWlNWR00wVFZSS1FrOVVTa1JPTUZGNFVXdEpNazFGVWtSUlZWSkhVbFZPUlU5VldUSk9SVXBHVDBSYVIxSnFTWGRPZW1zeVVYcEJNMDU2U1hvPQ=='
    );