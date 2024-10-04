<?php
include('config/connection.php');

// Check if a file was submitted via POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {

    // Get the patient_id (hardcoded)
    $patient_id = 4;

    
    $uploadDir = 'uploads/'; 

    // Get file information
    $fileName = basename($_FILES['file']['name']);
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    // Allowed file types 
    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];

    // Validate file type
    if (!in_array($fileType, $allowedTypes)) {
        echo "File type not allowed. Only JPG, PNG, and PDF files are allowed.";
        exit;
    }

    // Validate file size - limit to 5MB
    if ($fileSize > 5 * 1024 * 1024) {
        echo "File is too large. Maximum file size is 5MB.";
        exit;
    }

    // Handle file upload errors
    if ($fileError !== 0) {
        echo "There was an error uploading your file.";
        exit;
    }

    // Generate a unique file name using the patient ID and a timestamp to avoid overwriting...
    $uniqueFileName = $patient_id . '_' . time() . '_' . $fileName;
    $uploadPath = $uploadDir . $uniqueFileName;

    // Move the uploaded file to the target directory
    if (move_uploaded_file($fileTmpName, $uploadPath)) {
        // Insert file details into the database
        $sql = "INSERT INTO patient_files (patient_id, file_name, file_path) VALUES (?, ?, ?)";
        $stmt = $database->prepare($sql);
        $stmt->bind_param("iss", $patient_id, $uniqueFileName, $uploadPath);

        if ($stmt->execute()) {
            echo "File uploaded and saved successfully!";

            // Redirect back to the patient's file page 
            // header("Location: patient-files.php?patient_id=" . $patient_id);
            header("Location:patient-files.php");
            exit;
        } else {
            echo "Failed to save file info in the database.";
        }
    } else {
        echo "Failed to upload file.";
    }
} else {
    echo "No file was uploaded.";
}
?>
