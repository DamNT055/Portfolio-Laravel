<?php 
if (!function_exists('showMes')) {
    function showMes($error=true, $msg="", $data=false) {
        $json = (object) [
            'error' => $error, 
            'msg' => $msg,
            'data' => $data
        ];
        echo json_encode($json, JSON_PRETTY_PRINT);
    }
}