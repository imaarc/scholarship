<?php
include '../db/connect_db.php';

function saveImageToFolderAndDB($file, $studId, $docId, $dbConnection) {
    // Check if the file is uploaded
    if (isset($file['name']) && $file['error'] === UPLOAD_ERR_OK) {
        // Base directory where images will be saved
        $baseDir = __DIR__ . '/../requirementsImages';

        // Create the base directory if it doesn't exist
        if (!is_dir($baseDir)) {
            if (!mkdir($baseDir, 0777, true)) {
                return [
                    'success' => false,
                    'message' => 'Failed to create base directory: ' . $baseDir
                ];
            }
        }

        // Create a subdirectory with the current date (e.g., 2025-01-25)
        $dateFolder = date('Y-m-d');
        $subDir = $baseDir . '/' . $dateFolder;

        if (!is_dir($subDir)) {
            if (!mkdir($subDir, 0777, true)) {
                return [
                    'success' => false,
                    'message' => 'Failed to create subdirectory: ' . $subDir
                ];
            }
        }

        // Ensure a unique file name using a timestamp and a random number
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newFileName = date('Ymd_His') . '_' . uniqid() . '.' . $extension;
        $filePath = $subDir . '/' . $newFileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            // Save the relative file path in the database
            $relativePath = 'requirementsImages/' . $dateFolder . '/' . $newFileName; // Relative path for DB
            $sql = "INSERT INTO documents (Stud_Id, Doc_id, File_name) VALUES (?, ?, ?)";
            $stmt = $dbConnection->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("iis", $studId, $docId, $relativePath);
                if ($stmt->execute()) {
                    return [
                        'success' => true,
                        'message' => 'File uploaded and path saved to database successfully.',
                        'filePath' => $relativePath
                    ];
                } else {
                    return [
                        'success' => false,
                        'message' => 'Failed to save file path in database: ' . $stmt->error
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'Failed to prepare SQL statement: ' . $dbConnection->error
                ];
            }
        } else {
            return [
                'success' => false,
                'message' => 'Failed to move uploaded file to: ' . $filePath
            ];
        }
    } else {
        return [
            'success' => false,
            'message' => 'No file uploaded or file upload error.'
        ];
    }
}



// Get student ID from POST
$studId = $_POST['stud_id'];

// Document types mapping (key => Doc_id)
$docTypes = [
    'pic' => 1,
    'form137' => 2,
    'indigency' => 3,
    'scholarshipForm' => 4,
    'endorsement' => 5,
    'birth' => 6
];

// Files array
$files = [
    'pic' => $_FILES['pic'],
    'form137' => $_FILES['form137'],
    'indigency' => $_FILES['indigency'],
    'scholarshipForm' => $_FILES['scholarshipForm'],
    'endorsement' => $_FILES['endorsement'],
    'birth' => $_FILES['birth']
];

// Array to store results
$results = [];

foreach ($files as $key => $file) {
    if (!empty($file['name'])) { // Only process if a file was uploaded
        $docId = $docTypes[$key]; // Get Doc_id for the file type
        $result = saveImageToFolderAndDB($file, $studId, $docId, $connect);
        $results[$key] = $result;
    } else {
        $results[$key] = [
            'success' => false,
            'message' => 'No file uploaded for ' . $key
        ];
    }
}
header("Location:../studentIndex.php?id=$studId");
?>
