<?php

#  Verify captcha
$post_data = http_build_query(
    array(
        'secret' => '6Lf_AHMUAAAAAEmUuqMCo1KQp_9R-5qtbjpasuwj',
        'response' => $_POST['g-recaptcha-response'],
        'remoteip' => $_SERVER['REMOTE_ADDR']
    )
);
$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $post_data
    )
);
$context  = stream_context_create($opts);
$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
$result = json_decode($response);
if ($result->success) {
    include('prueba.php');   
}else{
    echo'<meta http-equiv="Refresh" content="5;url=../index.html"><br>
            [ERROR]- Requiere Validacion Recaptcha';

}
$response=null;


?>