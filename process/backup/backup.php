<?php
include '../../process/conn.php'; // This already includes your database connection settings

// Get data from the form
$initiator = $_POST['initiator'];
// $date_from = $_POST['date_from'];
// $date_to = $_POST['date_to'];

// Insert backup details into db_backup table
$sql = "INSERT INTO db_backup (initiator) VALUES ('$initiator')";
$stmt = $conn->prepare($sql);
$stmt->execute();

if($stmt){

    // Define the backup file name
    $backupFile = 'E-Report' . '_' . date('Y-m-d_H-i-s') . '.sql';

    // Path to the save folder
    $filepath = __DIR__ . '/../../../DB Backup/E-REPORT/';

    // Check if the folder exists, if not, create it
    if (!is_dir($filepath)) {
        mkdir($filepath, 0777, true);
    }

    // Full path to the backup file
    $fullBackupPath = $filepath . $backupFile;

    // Fetch credentials from the existing connection
    $host = $servername; // Use $servername from your conn.php
    $db_username = $username; // Use $username from your conn.php
    $db_password = $password; // Use $password from your conn.php
    $database = 'e-report'; // Your database name from conn.php

    // Create mysqldump command
    $command = "mysqldump --host=$host --user=$db_username --password=$db_password $database > $fullBackupPath";

    // Execute the command to create the backup
    system($command, $output);

    // Check if the backup was successful
    if ($output === 0) {
        echo "success";
    } else {
        echo "failed";
    }
} else {
    echo "Error: Unable to insert backup details into the database.";
}
?>
