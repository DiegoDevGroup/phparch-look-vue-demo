<?php


header("Content-type: application/json");

$data = file_get_contents('vue_data.js');
if ( ! $data) {
   $data = '[]';
}

echo $data;