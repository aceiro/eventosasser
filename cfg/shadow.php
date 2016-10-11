<?php

function minutum($key){
    list($dec1, $dec2) = explode(":", base64_decode(base64_decode(base64_decode($key))));
    if( $dec1 == '' ||
        $dec2 == '' || $dec2 != '83A8DB61B6835BDD5532D520A531059470386FDBDC22D848405B739AE8FFAB2E' ||
        md5( $dec2 ) != 'a36f2dac47a3b51a537b81bd0c6f4797') die("Ratio procedere possit rogatus");
    return $dec1;
}

return array(
    'u'  => 'V2xoYWJHSnVVblpqTWtabVdWZFNkRmxZVFRaUFJFNUNUMFZTUTA1cVJrTk9hbWQ2VGxWS1JWSkVWVEZOZWtwRlRsUkpkMUZVVlhwTlZFRXhUMVJSTTAxRVRUUk9hMXBGVVd0U1JFMXFTa1ZQUkZFMFRrUkJNVkZxWTNwUFZVWkdUMFZhUjFGVlNYbFNVVDA5',
    'p'  => 'U1RCRmRVMXFTWGROVkZacFQycG5lbEZVYUVWUmFsbDRVV3BaTkUxNlZrTlNSVkV4VGxSTmVWSkVWWGxOUlVVeFRYcEZkMDVVYXpCT2VrRjZUMFJhUjFKRlNrVlJla2w1VWtSbk1FOUVVWGRPVlVrelRYcHNRbEpVYUVkU2EwWkRUV3RWUFE9PQ=='
);