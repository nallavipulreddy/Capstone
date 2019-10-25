<?php
        $api_key="b880f57f49e9e443f77daa9e46907cc2";
        $ch=curl_init();
        $url="http://exploreit.icrisat.org/profile/crop%20improvement/30";
        $currentTime= time();
        curl_setopt($ch, CURLOPT_HEADER , 0);
        curl_setopt($ch, CURLOPT_URL , $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE , 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response=curl_exec($ch);
        $data=json_decode($response);
        echo '<pre>';
        print_r($data);
        echo $response;

    ?>
