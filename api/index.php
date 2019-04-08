<?php

$specialistId = array_key_exists ( 'specialistId' , $_GET) ? $_GET['specialistId'] : null;
$source = array_key_exists ( 'source' , $_GET) ? $_GET['source'] : null;

if($specialistId){    
    consultaAPI("http://clinic5.feegow.com.br/components/public/api//professional/list?especialidade_id=" . $specialistId);
}elseif($source){
    consultaAPI("http://clinic5.feegow.com.br/components/public/api/patient/list-sources");
}else{
    consultaAPI("http://clinic5.feegow.com.br/components/public/api/specialties/list");
}

function consultaAPI($link){

    $ch = curl_init($link);
    $authorization = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38";

    curl_setopt($ch, CURLOPT_HTTPHEADER, array("x-access-token:" . $authorization));    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $response = curl_exec($ch);

    curl_close($ch);

    echo $response;
}

?>