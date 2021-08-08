<?php

function redirecionar($paraOndeRedirecionar=null){

    if(is_null($paraOndeRedirecionar)){
        $paraOndeRedirecionar = '/';
    }

    header("Location:".$paraOndeRedirecionar);
    exit;

}