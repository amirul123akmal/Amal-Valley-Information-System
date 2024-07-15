<?php

class fileManager
{

    private $database;
    public function __construct($access)
    {
        $this->database = $access;
    }

    public function storeImage($data)
    {
        $fileTmpPath = $data['tmp_name'];
        $fileName = $data['name'];
        $fileSize = $data['size'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Sanitize file name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Check if the file type is allowed (optional)
        $allowedfileExtensions = ['jpg', 'png', 'jpeg', 'webm'];
        switch ($fileExtension) {
            case 'jpg':
            case 'jpeg':
                $image = imagecreatefromjpeg($fileTmpPath);
                break;
            case 'png':
                $image = imagecreatefrompng($fileTmpPath);
                break;
        }

        $imgResized = imagescale($image, 200, 200);


        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Directory where the file will be moved
            $uploadFileDir = dirname(__FILE__, 2) . '/img/activity/';
            $dest_path = $uploadFileDir . $newFileName;
            switch ($fileExtension) {
                case 'jpg':
                case 'jpeg':
                    imagejpeg($imgResized, $dest_path);
                    break;
                case 'png':
                    imagepng($imgResized, $dest_path);
                    break;
            }
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

            $this->database->updateSingleData("activity", (int) $this->database->getLatestIndex("activity", "activityid"), "activityimage", $newFileName);
            send("Return", 'File is successfully uploaded.');
        } else {
            throw new Exception('Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions));
        }
    }
}
