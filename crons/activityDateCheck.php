<?php

date_default_timezone_set('Asia/Kuala_Lumpur');
$root = dirname(__FILE__, 2);
require_once "{$root}\api\database.php";

function sending($id, $value)
{
    $root = dirname(__FILE__, 2);
    $data = array(
        "table" => "activity",
        "primarykey" => $id,
        "column" => "activitystatus",
        "value" => $value
    );

    $url = "localhost/amalvalley/api/update/row";
    echo $url;
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_VERBOSE => true, // Enable cURL debugging
        CURLOPT_STDERR => fopen('php://temp', 'w+') // Capture cURL debug output
    );

    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    if ($result === false) {
        $error = curl_error($ch);
        echo "cURL error: " . $error;
    }
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    echo $result;
    echo $status;
}

$current_date = date("Y-m-d");
$current_time = date("H:i:s");

$database = new database();
$result = $database->getActivityCheck($current_date);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['activitystatus'] == "Not Yet") {
            $activity_time_start = $row['activitytimestart'];
            $time_diff_start = strtotime($current_time) - strtotime($activity_time_start);
            echo "masuk : " . $time_diff_start . '<br>';
            echo "time_start: " . $activity_time_start . '<br>';
            echo "start int: " . strtotime($activity_time_start) . '<br>';
            echo "current_start: " . $current_time . '<br>';
            echo "current int: " . strtotime($current_time) . '<br>';
            if ($time_diff_start >= 0) {
                sending($row['activityid'], 'On Going');
            }
            continue;
        }
        if ($row['activitystatus'] == "On Going") {
            $activity_time_end = $row['activitytimeend'];
            $time_diff_end = strtotime($activity_time_end) - strtotime($current_time);
            echo "keluar : " . $time_diff_end . '<br>';
            echo "time_end: " . $activity_time_end . '<br>';
            echo "end int: " . strtotime($activity_time_end) . '<br>';
            echo "current_start: " . $current_time . '<br>';
            echo "current int: " . strtotime($current_time) . '<br>';
            if ($time_diff_end <= 0) {
                sending($row['activityid'], 'Done');
            }
        }
    }
}

