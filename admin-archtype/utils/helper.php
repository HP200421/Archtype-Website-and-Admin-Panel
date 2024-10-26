<?php
function deleteFile($filePaths){
    if (is_array($filePaths)) {
        foreach ($filePaths as $filePath) {
            $filePath = trim($filePath); 
            $fullPath = realpath(UPLOAD . $filePath); 
            if ($fullPath && file_exists($fullPath)) {
                @unlink($fullPath); 
            }
        }
    } else {
        $filePath = trim($filePaths); 
        $fullPath = realpath(UPLOAD . $filePath); 
        if ($fullPath && file_exists($fullPath)) {
            @unlink($fullPath); 
        }
    }
}
function validate($val){
    $val = trim($val);
    $val = htmlspecialchars($val);
    return $val;
}

function createSlug($string) {
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9]+/', '-', $string); 
    $string = trim($string, '-');
    return $string;
}

function select_query($conn, $table, $where = '') {
    $query = "SELECT * FROM $table";
    if ($where!= '') {
        $query.= " WHERE $where";
    }
    $result = $conn->query($query);
    return $result;
}

function uploadFile($files) {
    $targetDir = UPLOAD; // Make sure UPLOAD is defined and points to the correct directory
    $allowTypes = array('jpg', 'jpeg', 'png'); // Allowed file types
    $filePaths = [];
    $uploadSuccess = true;
    $uploadError = '';
    
    // Handle both single and multiple file uploads
    if (is_array($files['name'])) {
        foreach ($files['name'] as $key => $fileName) {
            $uniquePrefix = uniqid(); // Generate a unique ID for each file
            $fileName = $uniquePrefix . "_" . $fileName; // Add unique prefix to file name
            $targetFilePath = $targetDir . basename($fileName);
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

            // Check file type
            if (!in_array($fileType, $allowTypes)) {
                $uploadSuccess = false;
                $uploadError = 'Invalid file format for file: ' . $fileName . '. Only JPG, JPEG, and PNG files are allowed.';
                break;
            }

            // Check file size (2MB limit)
            if ($files['size'][$key] > 2000000) {
                $uploadSuccess = false;
                $uploadError = 'File size for file: ' . $fileName . ' should not exceed 2MB.';
                break;
            }

            // Move the uploaded file
            if (move_uploaded_file($files['tmp_name'][$key], $targetFilePath)) {
                $filePaths[] = basename($fileName);
            } else {
                $uploadSuccess = false;
                $uploadError = 'There was an error uploading file: ' . $fileName . '.';
                break;
            }
        }
    } else {
        // Handle single file upload
        $uniquePrefix = uniqid(); // Generate a unique ID for the single file
        $fileName = $uniquePrefix . "_" . $files['name']; // Add unique prefix to file name
        $targetFilePath = $targetDir . basename($fileName); // Use updated file name with unique prefix
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Check file type
        if (!in_array($fileType, $allowTypes)) {
            $uploadSuccess = false;
            $uploadError = 'Invalid file format for file: ' . $files['name'] . '. Only JPG, JPEG, and PNG files are allowed.';
        } elseif ($files['size'] > 2000000) {
            // Check file size
            $uploadSuccess = false;
            $uploadError = 'File size for file: ' . $files['name'] . ' should not exceed 2MB.';
        } elseif (move_uploaded_file($files['tmp_name'], $targetFilePath)) {
            $filePaths[] = basename($fileName); // Use updated file name with unique prefix
        } else {
            $uploadSuccess = false;
            $uploadError = 'There was an error uploading file: ' . $files['name'] . '.';
        }
    }

    return [
        'filePaths' => $filePaths,
        'uploadSuccess' => $uploadSuccess,
        'uploadError' => $uploadError,
    ];
}




// IF only multiple files are uploaded
// function uploadFile($files) {
//     $targetDir = UPLOAD;
//     // $allowTypes = array('jpg', 'jpeg', 'png', 'pdf');
//     $allowTypes = array('jpg', 'jpeg', 'png');
//     $filePaths = [];
//     $uploadSuccess = true;
//     $currentTimestamp = time(); 
//     $uploadError = '';

//     if (is_array($files['name'])) {
//         foreach ($files['name'] as $key => $fileName) {
//             $fileName = $currentTimestamp . "_" . $fileName;
//             $targetFilePath = $targetDir . basename($fileName);
//             $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
//             if (!in_array($fileType, $allowTypes)) {
//                 $uploadSuccess = false;
//                 $uploadError = 'Invalid file format for file: ' . $fileName . '. Only JPG, JPEG and PNG files are allowed.';
//                 break;
//             }
        
//             if ($files['size'][$key] > 2000000) {
//                 $uploadSuccess = false;
//                 $uploadError = 'File size for file: ' . $fileName . ' should not exceed 2MB.';
//                 break;
//             }
        
//             if (move_uploaded_file($files['tmp_name'][$key], $targetFilePath)) {
//                 $filePaths[] = basename($fileName);
//             } else {
//                 $uploadSuccess = false;
//                 $uploadError ='There was an error uploading file: ' . $fileName . '.';
//                 break;
//             }
//         }
//     } else {
//         $uploadSuccess = false;
//         $uploadError = 'Error with file upload. Please try again.';
//     }

//     return [
//         'filePaths' => $filePaths,
//         'uploadSuccess' => $uploadSuccess,
//         'uploadError' => $uploadError,
//     ];
// }
?>