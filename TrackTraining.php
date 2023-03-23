<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include('TrackTraining.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input'), true);

    $file = 'TrackTraining.json';
    $current_data = file_get_contents($file);
    $current_data = json_decode($current_data, true) ?? array();
    array_push($current_data, $data);
    $final_data = json_encode($current_data);

    file_put_contents($file, $final_data);

    echo json_encode(array('message' => 'Data saved successfully'));
}
?>
