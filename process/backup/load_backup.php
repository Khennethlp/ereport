<?php
include '../../process/conn.php'; 

$sql = "SELECT * FROM db_backup";
$stmt = $conn->prepare($sql);
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $k) {
    echo '<tr>';
    echo '<td>' . date('Y/m/d', strtotime($k['backup_at'])) . '</td>';
    echo '<td>' . htmlspecialchars($k['initiator']) . '</td>';
    echo '</tr>';
}