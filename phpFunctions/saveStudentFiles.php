<?php
include '../db/connect_db.php';

function saveImageToFolderAndDB($file, $studId, $docId, $dbConnection) {
    if (isset($file['name']) && $file['error'] === UPLOAD_ERR_OK) {
        $baseDir = __DIR__ . '/../requirementsImages';
        if (!is_dir($baseDir) && !mkdir($baseDir, 0777, true)) {
            return ['success' => false, 'message' => 'Failed to create base directory.'];
        }
        
        $dateFolder = date('Y-m-d');
        $subDir = $baseDir . '/' . $dateFolder;
        if (!is_dir($subDir) && !mkdir($subDir, 0777, true)) {
            return ['success' => false, 'message' => 'Failed to create subdirectory.'];
        }
        
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newFileName = date('Ymd_His') . '_' . uniqid() . '.' . $extension;
        $filePath = $subDir . '/' . $newFileName;

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            $relativePath = 'requirementsImages/' . $dateFolder . '/' . $newFileName;
            $sql = "INSERT INTO documents (Stud_Id, Doc_id, File_name) VALUES (?, ?, ?)";
            $stmt = $dbConnection->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("iis", $studId, $docId, $relativePath);
                if ($stmt->execute()) {
                    return ['success' => true, 'message' => 'File uploaded successfully.', 'filePath' => $relativePath];
                } else {
                    return ['success' => false, 'message' => 'Failed to save file in DB: ' . $stmt->error];
                }
            } else {
                return ['success' => false, 'message' => 'Failed to prepare SQL: ' . $dbConnection->error];
            }
        } else {
            return ['success' => false, 'message' => 'Failed to move uploaded file.'];
        }
    }
    return ['success' => false, 'message' => 'No file uploaded or error in upload.'];
}

$studId = $_POST['stud_id'];
$results = [];

// Fetch document types dynamically
$docTypeQuery = "SELECT * FROM documenttype";
$docTypeResult = mysqli_query($connect, $docTypeQuery);

while ($row = mysqli_fetch_assoc($docTypeResult)) {
    $docId = $row['doc_id'];
    $inputName = 'doc' . $docId;
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
        $results[$inputName] = saveImageToFolderAndDB($_FILES[$inputName], $studId, $docId, $connect);
    } else {
        $results[$inputName] = ['success' => false, 'message' => 'No file uploaded for ' . $inputName];
    }
}

header("Location: ../studentIndex.php?id=$studId");
?>
