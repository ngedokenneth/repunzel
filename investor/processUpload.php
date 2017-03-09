<?php

session_start();
if (!isset($_SESSION['user']))
    header("location: /index.php");

require_once "../handlerDbConnection.php";

//turn on php error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $name = $_FILES['fileToUpload']['name'];
    $tmpName = $_FILES['fileToUpload']['tmp_name'];
    $error = $_FILES['fileToUpload']['error'];
    $size = $_FILES['fileToUpload']['size'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    
    $tc = htmlspecialchars($_POST['tc']) ;
    $newfilename = $tc . '.' . $ext;

    

    switch ($error) {
        case UPLOAD_ERR_OK:
            $valid = true;
            //validate file extensions
            if (!in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                $valid = false;
                $response = 'Invalid file extension.';
            }
            //validate file size
            if ($size / 1024 / 1024 > 3) {
                $valid = false;
                $response = 'File size is exceeding maximum allowed size.';
            }
            //upload file
            if ($valid) {
                $targetPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pop' . DIRECTORY_SEPARATOR . $newfilename;
                fopen($targetPath, "w");
                if (move_uploaded_file($tmpName, $targetPath)) {
                    //save record to ph in database
                    $sql = "UPDATE ph SET status='awaiting confirmation', pop='" . $newfilename . "' WHERE transaction_code='" . $tc . "'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    
//                    $response = 'success';
                    header("location: /investor/backoffice.php");
                }
            }
            break;
        case UPLOAD_ERR_INI_SIZE:
            $response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $response = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
            break;
        case UPLOAD_ERR_PARTIAL:
            $response = 'The uploaded file was only partially uploaded.';
            break;
        case UPLOAD_ERR_NO_FILE:
            $response = 'No file was uploaded.';
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
            break;
        case UPLOAD_ERR_EXTENSION:
            $response = 'File upload stopped by extension. Introduced in PHP 5.2.0.';
            break;
        default:
            $response = 'Unknown error';
            break;
    }

    header("location: /investor/backoffice.php?error=". $response);
//    echo $ext;
}
?>