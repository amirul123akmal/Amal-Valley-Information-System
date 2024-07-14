<?php
header('Content-Type: application/json');

$submission;
function send($custom, $message)
{
    global $submission;
    $submission[$custom] = $message;
}

function submit()
{
    global $submission;
    // when $submission change into an array, the json portion contains element array "[] <- this"
    // that's why we need to use [0] to get the ONLY first element(it's our json data)
    echo json_encode(array($submission)[0], JSON_PRETTY_PRINT);
}

try {
    require_once "database.php";
    $parts = explode("/", $_SERVER['REQUEST_URI']);
    // "parts" = array

    $k = 0;
    foreach ($parts as $value) {
        if (strcmp($value, 'api') != 0) {
            unset($parts[$k++]);
        } else {
            break;
        }
    }

    $parts = array_values($parts);

    // 1 = create/read/update/delete
    // 2 & onwards = required information
    // print_r($parts);

    // exception for image uploading
    if (isset($parts[2])) {
        if (strcmp($parts[2], 'image') != 0) {
            $data = json_decode(file_get_contents('php://input'), true);
        }
    }

    $database = new database();
    // The CRUD Functionality
    // CREATE
    if (strcmp($parts[1], 'create') == 0) {
        switch ($parts[2]) {
            case 'document':
                send("Return", $database->document($data['key'], $data['basting']));
                break;
            case 'chooseactivity':
                send('Return', $database->chooseActivity($parts[3], $data['key'], $data['userid']));
                break;
            case 'register':
                $database->register($data['type'], $data['username'], $data['password'], $data['email'], $data['state'], $data['phone']);
                break;
            case 'registeractivity':
                $database->registerActivity($data['name'], $data['place'], $data['date'], $data['time']);
                break;
            case 'admin':
                $database->addAdmin($data['name'], $data['pass'], $data['email'], $data['state'], $data['phone']);
                break;
            case 'image':
                if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['image']['tmp_name'];
                    $fileName = $_FILES['image']['name'];
                    $fileSize = $_FILES['image']['size'];
                    $fileType = $_FILES['image']['type'];
                    $fileNameCmps = explode(".", $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));

                    // Sanitize file name
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

                    // Check if the file type is allowed (optional)
                    $allowedfileExtensions = ['jpg', 'png', 'jpeg', 'webm'];
                    if (in_array($fileExtension, $allowedfileExtensions)) {
                        // Directory where the file will be moved
                        $uploadFileDir = dirname(__FILE__, 2) . '/img/activity/';
                        $dest_path = $uploadFileDir . $newFileName;

                        // Check if directory exists and is writable
                        if (!is_dir($uploadFileDir)) {
                            throw new Exception('Upload directory does not exist. : ');
                        }

                        if (!is_writable($uploadFileDir)) {
                            throw new Exception('Upload directory is not writable.');
                        }

                        // Check if the temporary file exists
                        if (!file_exists($fileTmpPath)) {
                            throw new Exception('Temporary file does not exist.');
                        }

                        if (move_uploaded_file($fileTmpPath, $dest_path)) {
                            // Assuming $database is already defined and initialized
                            $database->updateSingleData("activity", (int) $database->getLatestIndex("activity", "activityid"), "activityimage", $newFileName);
                            send("Return", 'File is successfully uploaded.');
                        } else {
                            error_log('Error moving uploaded file: ' . print_r(error_get_last(), true));
                            throw new Exception('There was some error moving the file to upload directory.');
                        }
                    } else {
                        throw new Exception('Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions));
                    }
                } else {
                    $message = 'There is some error in the file upload. Please check the following error.<br>';
                    $message .= 'Error:' . $_FILES['image']['error'];
                    throw new Exception($message);
                }
        }
        // READ
    } else if (strcmp($parts[1], 'read') == 0) {
        switch ($parts[2]) {
            case 'email':
                send('Return',$database->getAllEmail());
                break;
            case 'count':
                $cumulatedData = [];
                if (isset($parts[4])) {
                    for ($i = 0; $i < (int) $parts[3]; $i++) {
                        $cumulatedData[$i] = $database->count($parts[4 + $i]);
                    }
                    send("Return", $cumulatedData);
                    break;
                }
                send("Return", $database->count($parts[3]));
                break;
            case 'login':
                send("Return", $database->login($data['username'], $data['password']));
                break;
            case 'activity':
                send("Return", $database->getAllSpesific("activity"));
                break;
            case "latest-index":
                send("Return", $database->getLatestIndex($data['table'], $data['column']));
                break;
            case 'beneficiaries':
            case 'volunteer':
            case 'admin':
                send("Return", $database->getAllSpesific($parts[2]));
                break;

            case "spesific":
                switch ($parts[3]) {
                    case "beneficiaries":
                        send('Return', $database->getSpesific($parts[3], $data['key']));
                        break;
                }
                break;
        }
        // UPDATE
    } else if (strcmp($parts[1], 'update') == 0) {
        switch ($parts[2]) {
            case 'row':
                send('Return', $database->updateSingleData($data['table'], $data['primarykey'], $data['column'], $data['value']));
                break;
            case 'activity':
                send('Return', $database->updateActivity($data['key'], $data['name'], $data['place'], $data['date'], $data['status'], $data['time']));
                break;
            case 'beneficiaries':
            case 'volunteer':
            case 'admin':
                send('Return', $database->updateUser($parts[2], $data['key'], $data['name'], $data['email'], $data['phone'], $data['state'], $data['status']));
                break;
        }

        // DELETE
    } else if (strcmp($parts[1], 'delete') == 0) {
        switch ($parts[2]) {
            case 'activity':
                send("Return", $database->deleteSingleRow('activity', 'activityid', $data['key']));
                break;
            case 'volunteer':
            case 'beneficiary':
            case 'admin':
                send('Return', $database->deleteSingleRow($parts[2], $data['id_type'], $data['key']));
                break;
        }
    }

    // sending basic responce
    send("Status", "Success");
    submit();
} catch (Exception $e) {
    send("Status", 'error');
    send("error", $e->getMessage());
    send("errorType", get_class($e));
    submit();
}