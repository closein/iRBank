<!--
utility.php
Hamed masrour
sepehrpay.com
-->

<?php

function url_current_dir(){

  $directory_array=explode("/",$_SERVER['REQUEST_URI']);
  $directory=$directory_array[1];

    return sprintf(
      "%s://%s/%s/",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],
      // 'ipg_tester'
      // $_SERVER['REQUEST_URI']
      $directory
    );
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function makeHttpChargeRequest($_Method,$_Data,$_Address){
  $curl= curl_init();
  curl_setopt($curl, CURLOPT_URL, $_Address);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $_Method);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $_Data);
  $result = curl_exec($curl);
  curl_close($curl);
  return $result;
  
}
  
?>
