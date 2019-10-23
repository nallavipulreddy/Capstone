<?php
include'dbh.php';
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
$display=$_SESSION['username'];
$channel=$_SESSION['channel_id'];
$auth=$_SESSION['auth_key'];

		$ses=$_SESSION['channel_id'];
        $auth=$_SESSION['auth_key'];
        //echo $ses;
        echo $auth;
        $ch=curl_init();
        $url="https://api.thingspeak.com/channels/".$ses."/fields/1.json?api_key=".$auth."&results=2";
        curl_setopt($ch, CURLOPT_URL , $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response=curl_exec($ch);
        $data=json_decode($response);
        //echo $data;


?>