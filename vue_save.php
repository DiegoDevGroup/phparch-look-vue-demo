<?php


$data = file_get_contents('vue_data.js');

$json = json_decode($data);

$postdata = json_decode(file_get_contents("php://input"));


$newPlayer = new stdClass();
$newPlayer->name = $postdata->name;
$newPlayer->playing = $postdata->playing;

$new = true;
foreach ($json as $index => $player) {
    if ($player->name == $newPlayer->name) {
        $json[$index] = $newPlayer;
        $new = false;
    }
}

if ($new) $json[] = $newPlayer;

$fh = fopen('vue_data.js', 'w');
fputs($fh, json_encode($json));
fclose($fh);