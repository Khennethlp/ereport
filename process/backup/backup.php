<?php
include '../../process/conn.php'; // This already includes your database connection settings

try {
    // Get data from the form
    $initiator = $_POST['initiator'];

    // Prepare and bind parameters securely
    $sql = "INSERT INTO db_backup (initiator) VALUES (:initiator)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':initiator', $initiator, PDO::PARAM_STR);
    $stmt->execute();

    // Check if insertion was successful
    if ($stmt) {
        // Define the backup file name
        $backupFile = 'E-Report_' . date('Y-m-d') . '.sql';

        // Path to the save folder
        $filepath = __DIR__ . '/../../../DB Backup/E-REPORT/';

        // Check if the folder exists, if not, create it
        if (!is_dir($filepath)) {
            if (!mkdir($filepath, 0777, true)) {
                throw new Exception("Failed to create directory: $filepath");
            }
        }

        // Full path to the backup file
        $fullBackupPath = $filepath . $backupFile;

        // Fetch credentials from the existing connection
        $host = $servername; // Use $servername from your conn.php
        $db_username = $username; // Use $username from your conn.php
        $db_password = $password; // Use $password from your conn.php
        $database = 'e-report'; // Your database name from conn.php

        // Path to mysqldump in XAMPP
        $mysqldumpPath = 'C:/xampp/mysql/bin/mysqldump.exe'; // Adjust if needed

        // Create mysqldump command
        $command = "\"$mysqldumpPath\" --host=$host --user=$db_username --password=$db_password $database > \"$fullBackupPath\"";

        // Use exec to capture output
        $output = [];
        $return_var = null;
        exec($command . ' 2>&1', $output, $return_var);

        // Check if the backup was successful (exit status 0 indicates success)
        if ($return_var === 0) {
            echo 'success';
            // echo "Backup created successfully: $fullBackupPath";
        } else {
            echo 'failed';
            // echo "Failed to create backup. Error code: $return_var\n";
            // echo "Command output: " . implode("\n", $output); // Output the errors for debugging
        }
    } else {
        throw new Exception("Unable to insert backup details into the database.");
    }
} catch (Exception $e) {
    echo 'error';
    // echo "Error: " . $e->getMessage();
}
