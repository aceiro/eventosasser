<?php

function minutum($key){
    list($dec1, $dec2) = explode(":", base64_decode(base64_decode(base64_decode($key))));
    if( $dec1 == '' ||
        $dec2 == '' || $dec2 != '83A8DB61B6835BDD5532D520A531059470386FDBDC22D848405B739AE8FFAB2E' ||
        md5( $dec2 ) != 'a36f2dac47a3b51a537b81bd0c6f4797') die("Ratio procedere possit rogatus");
    return $dec1;
}

return array(
    'u'  => 'WTIwNWRtUkVielJOTUVVMFVrVkpNazFWU1RKUFJFMHhVV3RTUlU1VVZYcE5hMUV4VFdwQ1FrNVVUWGhOUkZVMVRrUmpkMDE2WnpKU2ExSkRVa1ZOZVUxclVUUk9SR2N3VFVSV1EwNTZUVFZSVlZVMFVtdGFRbEZxU2tZPQ==',
    'p'  => 'VFZSSmVrNUVielJOTUVVMFVrVkpNazFWU1RKUFJFMHhVV3RTUlU1VVZYcE5hMUV4VFdwQ1FrNVVUWGhOUkZVMVRrUmpkMDE2WnpKU2ExSkRVa1ZOZVUxclVUUk9SR2N3VFVSV1EwNTZUVFZSVlZVMFVtdGFRbEZxU2tZPQ=='
);