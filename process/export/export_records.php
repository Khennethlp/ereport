<?php
require '../../process/conn.php';

$search_serial = isset($_POST['search_serial']) ? $_POST['search_serial'] : '';
$search_batch = isset($_POST['search_batch']) ? $_POST['search_batch'] : '';
$search_group = isset($_POST['search_group']) ? $_POST['search_group'] : '';
$search_tgroup = isset($_POST['search_tgroup']) ? $_POST['search_tgroup'] : '';
$search_docs = isset($_POST['search_docs']) ? $_POST['search_docs'] : '';
$search_filename = isset($_POST['search_filename']) ? $_POST['search_filename'] : '';
$search_year = isset($_POST['search_year']) ? $_POST['search_year'] : '';
$search_month = isset($_POST['search_month']) ? $_POST['search_month'] : '';

$c = 0;
$delimiter = ",";
$datenow = date('Y-m-d');
$filename = "E-Report_" . $datenow . ".csv";

// Create a file pointer
$f = fopen('php://memory', 'w');

// Output the UTF-8 BOM for Excel compatibility
fputs($f, "\xEF\xBB\xBF");

// Set column headers
$fields = array('#', 'Serial No', 'Batch No.', 'Group No.', 'Month', 'Year', 'Document', 'Training Group', 'Filename', 'Checked By', 'Checked Date', 'Approved By', 'Approved Date');
fputcsv($f, $fields, $delimiter);

$query = "SELECT a.*, b.* 
            FROM t_training_record a 
            LEFT JOIN (SELECT * FROM t_upload_file GROUP BY serial_no) b 
            ON a.serial_no = b.serial_no 
            WHERE 1=1";  // 1=1 ensures we can add conditions easily

// Add filters
if (!empty($search_serial)) {
    $query .= " AND a.serial_no LIKE :search_serial";
}
if (!empty($search_batch)) {
    $query .= " AND a.batch_no LIKE :search_batch";
}
if (!empty($search_group)) {
    $query .= " AND a.group_no LIKE :search_group";
}
if (!empty($search_tgroup)) {
    $query .= " AND a.training_group LIKE :search_tgroup";
}
if (!empty($search_docs)) {
    $query .= " AND b.main_doc LIKE :search_docs";
}
if (!empty($search_filename)) {
    $query .= " AND b.file_name LIKE :search_filename";
}
if (!empty($search_year)) {
    $query .= " AND a.upload_year = :search_year";
}
if (!empty($search_month)) {
    $query .= " AND a.upload_month LIKE :search_month";
}

$query .= " AND approver_status = 'APPROVED'";

// Prepare the statement
$stmt = $conn->prepare($query);

// Bind parameters
if (!empty($search_serial)) {
    $search_serial = "$search_serial%";
    $stmt->bindParam(':search_serial', $search_serial, PDO::PARAM_STR);
}
if (!empty($search_batch)) {
    $search_batch = "$search_batch%";
    $stmt->bindParam(':search_batch', $search_batch, PDO::PARAM_STR);
}
if (!empty($search_group)) {
    $search_group = "$search_group%";
    $stmt->bindParam(':search_group', $search_group, PDO::PARAM_STR);
}
if (!empty($search_tgroup)) {
    $search_tgroup = "$search_tgroup%";
    $stmt->bindParam(':search_tgroup', $search_tgroup, PDO::PARAM_STR);
}
if (!empty($search_docs)) {
    $search_docs = "%$search_docs%";
    $stmt->bindParam(':search_docs', $search_docs, PDO::PARAM_STR);
}
if (!empty($search_filename)) {
    $search_filename = "$search_filename%";
    $stmt->bindParam(':search_filename', $search_filename, PDO::PARAM_STR);
}
if (!empty($search_year)) {
    $stmt->bindParam(':search_year', $search_year, PDO::PARAM_INT);
}
if (!empty($search_month)) {
    $search_month = "$search_month%";
    $stmt->bindParam(':search_month', $search_month, PDO::PARAM_STR);
}

// Execute the query
$stmt->execute();

// Fetch data and write to CSV
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $c++;

    foreach ($row as $key => $value) {
        $row[$key] = str_replace(["\r", "\n"], " ", $value);
    }

    // Prepare data for CSV
    $lineData = array(
        $c,
        $row['serial_no'],
        $row['batch_no'],
        $row['group_no'],
        $row['upload_month'],
        $row['upload_year'],
        $row['main_doc'],
        $row['training_group'],
        $row['file_name'],
        $row['checker_name'],
        $row['checked_date'],
        $row['approver_name'],
        $row['approved_date'],
    );
    fputcsv($f, $lineData, $delimiter);
}

// Move back to the beginning of the file
fseek($f, 0);

// Set headers for download
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="' . $filename . '";');
header('Pragma: no-cache');
header('Expires: 0');

// Output all remaining data on a file pointer
fpassthru($f);

// Close the file pointer
fclose($f);

// Close the connection
$conn = null;
exit;
?>
