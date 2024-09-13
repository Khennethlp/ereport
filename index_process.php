<?php
include 'process/conn.php';

$method = $_POST['method'];

if ($method == 'load_data') {
    $serialNo = $_POST['serialNo'];
    $batchNo = $_POST['batchNo'];
    $groupNo = $_POST['groupNo'];
    $trainingGroup = $_POST['trainingGroup'];
    $fileName = $_POST['fileName'];
    $docs = $_POST['docs'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
    $rowsPerPage = isset($_POST['rows_per_page']) ? (int)$_POST['rows_per_page'] : 50;
    $offset = ($page - 1) * $rowsPerPage;

    $sql = "SELECT a.*, b.* 
            FROM t_training_record a 
            LEFT JOIN (SELECT * FROM t_upload_file GROUP BY serial_no) b 
            ON a.serial_no=b.serial_no 
            WHERE approver_status = 'APPROVED'";

    if (!empty($serialNo)) {
        $sql .= " AND a.serial_no LIKE :search_by_serialNo";
    }
    if (!empty($batchNo)) {
        $sql .= " AND a.batch_no LIKE :search_by_batchNo";
    }
    if (!empty($groupNo)) {
        $sql .= " AND a.group_no LIKE :search_by_groupNo";
    }
    if (!empty($trainingGroup)) {
        $sql .= " AND a.training_group LIKE :search_by_tGroup";
    }
    if (!empty($fileName)) {
        $sql .= " AND b.file_name LIKE :search_by_filename";
    }
    if (!empty($docs)) {
        $sql .= " AND b.main_doc LIKE :search_by_docs";
    }
    if (!empty($year)) {
        $sql .= " AND a.upload_year = :year";
    }
    if (!empty($month)) {
        $sql .= " AND a.upload_month LIKE :month";
    }

    $sql .= " LIMIT :limit_plus_one OFFSET :offset";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $limit_plus_one = $rowsPerPage + 1;
    $stmt->bindParam(':limit_plus_one', $limit_plus_one, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);

    if (!empty($serialNo)) {
        $serialNo = "$serialNo%";
        $stmt->bindParam(':search_by_serialNo', $serialNo, PDO::PARAM_STR);
    }
    if (!empty($batchNo)) {
        $batchNo = "$batchNo%";
        $stmt->bindParam(':search_by_batchNo', $batchNo, PDO::PARAM_STR);
    }
    if (!empty($groupNo)) {
        $groupNo = "$groupNo%";
        $stmt->bindParam(':search_by_groupNo', $groupNo, PDO::PARAM_STR);
    }
    if (!empty($trainingGroup)) {
        $trainingGroup = "$trainingGroup%";
        $stmt->bindParam(':search_by_tGroup', $trainingGroup, PDO::PARAM_STR);
    }
    if (!empty($fileName)) {
        $fileName = "$fileName%";
        $stmt->bindParam(':search_by_filename', $fileName, PDO::PARAM_STR);
    }
    if (!empty($docs)) {
        $docs = "%$docs%";
        $stmt->bindParam(':search_by_docs', $docs, PDO::PARAM_STR);
    }
    if (!empty($year)) {
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
    }
    if (!empty($month)) {
        $month = "$month%";
        $stmt->bindParam(':month', $month, PDO::PARAM_STR);
    }

    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $has_more = count($rows) > $rowsPerPage;
    if ($has_more) {
        array_pop($rows); // Remove the extra row used for the check
    }

    $data = '';
    $c = $offset + 1;
    foreach ($rows as $k) {
        $file_path = '../uploads/ereport/' . htmlspecialchars($k['serial_no']) . '/';
        $file_path .= htmlspecialchars($k['main_doc']) . '/';
        if (!empty($k['sub_doc'])) {
            $file_path .= htmlspecialchars($k['sub_doc']) . '/';
        }
        $file_path .= $k['file_name'];

        $data .= '<tr>';
        $data .= '<td>' . $c . '</td>';
        $data .= '<td>' . htmlspecialchars($k['serial_no']) . '</td>';
        $data .= '<td>' . htmlspecialchars($k['batch_no']) . '</td>';
        $data .= '<td>' . htmlspecialchars($k['group_no']) . '</td>';
        $data .= '<td>' . htmlspecialchars($k['upload_month']) . '</td>';
        $data .= '<td>' . htmlspecialchars($k['upload_year']) . '</td>';
        $data .= '<td>' . htmlspecialchars($k['main_doc']) . '</td>';
        $data .= '<td>' . htmlspecialchars($k['training_group']) . '</td>';
        $data .= '<td title="' . $k['file_name'] . '">' . (strlen($k['file_name']) > 45 ? substr($k['file_name'], 0, 45) . '...' : $k['file_name']) . '</td>';
        
        $data .= '<td>' . htmlspecialchars($k['checker_name']) . '</td>';
        if(empty($k['checker_name'])){
            $data .= '<td></td>';
        }else{
            $data .= '<td>' . date('Y/m/d', strtotime($k['checked_date'])) . '</td>';
        }
        $data .= '<td>' . htmlspecialchars($k['approver_name']) . '</td>';
        $data .= '<td>' . date('Y/m/d', strtotime($k['approved_date'])) . '</td>';


        if (file_exists($file_path)) {
            $data .= '<td style="cursor: pointer;"><a class="btn btn-danger py-1" href="' . $file_path . '" target="_blank">View</a></td>';
        }
        $data .= '</tr>';
        $c++;
    }

    if (empty($data)) {
        $data = '<tr><td colspan="10" style="text-align:center;">No data found.</td></tr>';
    }

    echo json_encode(['html' => $data, 'has_more' => $has_more]);
}

if ($method == 'counts') {
    $sql = "SELECT count(*) as count FROM t_training_record WHERE approver_status = 'APPROVED'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result !== false) {
        echo 'Total: ' . $result['count'];
    } else {
        echo 'Total: 0';
    }
}