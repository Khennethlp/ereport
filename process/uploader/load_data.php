<?php
include '../../process/conn.php';

$method = $_POST['method'];

if ($method == 'load_data') {

    $uploader_name = isset($_POST['uploader_name']) ? $_POST['uploader_name'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $search_by_serialNo = isset($_POST['search_by_serialNo']) ? $_POST['search_by_serialNo'] : '';
    $search_by_batchNo = isset($_POST['search_by_batchNo']) ? $_POST['search_by_batchNo'] : '';
    $search_by_groupNo = isset($_POST['search_by_groupNo']) ? $_POST['search_by_groupNo'] : '';
    $search_by_tgroup = isset($_POST['search_by_tgroup']) ? $_POST['search_by_tgroup'] : '';
    $search_by_docs = isset($_POST['search_by_docs']) ? $_POST['search_by_docs'] : '';
    $search_by_filename = isset($_POST['search_by_filename']) ? $_POST['search_by_filename'] : '';
    $month = isset($_POST['month']) ? $_POST['month'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';

    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
    $rowsPerPage = isset($_POST['rows_per_page']) ? (int)$_POST['rows_per_page'] : 10;
    $offset = ($page - 1) * $rowsPerPage;

    $sql = "SELECT 
                a.*, 
                b.main_doc AS main_doc, 
                b.sub_doc, 
                b.file_name AS file_name,
                b.updated_file AS updated_file,
                b.uploader_updated_file AS uploader_updated_file,
                CASE 
                    WHEN a.checker_status = 'Pending' THEN 'FOR CHECKING' 
                    WHEN a.checker_status = 'Disapproved' THEN 'Disapproved'
                    WHEN a.checker_status = 'Approved' AND a.approver_status = 'Pending' THEN 'For Approval'
                    WHEN a.checker_status = 'Disapproved' AND a.approver_status = 'Pending' THEN 'Disapproved'
                    WHEN a.checker_status = 'Approved' AND a.approver_status = 'Disapproved' THEN 'Disapproved'
                    WHEN a.checker_status = 'Disapproved' AND a.approver_status = 'Disapproved' THEN 'Disapproved'
                    WHEN a.checker_status = 'Approved' AND a.approver_status = 'Approved' THEN 'Approved'
                    WHEN a.checker_status = '' AND a.approver_status = 'Pending' THEN 'For Approval'
                    WHEN a.checker_status = '' AND a.approver_status = 'Approved' THEN 'Approved'
                    WHEN a.checker_status = '' AND a.approver_status = 'Disapproved' THEN 'Disapproved'
                END AS global_status, 
                CASE 
                    WHEN a.checker_status = 'Approved' AND a.approver_status = 'Disapproved' THEN a.approver_name
                    WHEN a.checker_status = '' AND a.approver_status = 'Disapproved' THEN a.approver_name
                    WHEN a.checker_status = 'Disapproved' THEN a.checker_name
                END AS disapprover_name,
                CASE
                    -- WHEN a.checker_comment != '' THEN a.checker_comment
                    -- WHEN a.approver_comment != '' THEN a.approver_comment
                    WHEN a.checker_status = 'Disapproved' THEN a.checker_comment
                    WHEN a.checker_status = 'Approved' AND a.approver_status = 'Disapproved' THEN a.approver_comment
                    WHEN a.checker_status = '' AND a.approver_status = 'Disapproved' THEN a.approver_comment
                END AS global_comment
            FROM 
                t_training_record a 
            RIGHT JOIN 
                (SELECT id, serial_no, main_doc, sub_doc, file_name, updated_file, uploader_updated_file  FROM t_upload_file ) b 
            ON 
                a.serial_no = b.serial_no AND a.id=b.id
            WHERE 
                uploader_name = :uploader_name";

    $conditions = [];
    if (!empty($status)) {
        $conditions[] = "(
            (a.checker_status = 'Pending' AND :status = 'Pending') OR
            (a.checker_status = 'Disapproved' AND :status = 'Disapproved') OR
            (a.checker_status = 'Approved' AND a.approver_status = 'Pending' AND :status = 'Pending') OR
            (a.checker_status = 'Approved' AND a.approver_status = 'Approved' AND :status = 'Approved') OR
            (a.checker_status = 'Disapproved' AND a.approver_status = 'Disapproved' AND :status = 'Disapproved') OR
            (a.checker_status = 'Disapproved' AND a.approver_status = 'Pending' AND :status = 'Disapproved') OR
            (a.checker_status = 'Approved' AND a.approver_status = 'Disapproved' AND :status = 'Disapproved') OR
            (a.checker_status = '' AND a.approver_status = 'Pending' AND :status = 'Pending') OR
            (a.checker_status = '' AND a.approver_status = 'Approved' AND :status = 'Approved') OR
            (a.checker_status = '' AND a.approver_status = 'Disapproved' AND :status = 'Disapproved') 
        )";
    }

    if (!empty($year)) {
        $sql .= "a.upload_year = :year";
    }
    if (!empty($month)) {
        $sql .= "a.upload_month LIKE :month";
    }
    if (!empty($search_by_serialNo)) {
        $conditions[] = "a.serial_no = :search_by_serialNo";
    }
    if (!empty($search_by_batchNo)) {
        $conditions[] = "a.batch_no = :search_by_batchNo";
    }
    if (!empty($search_by_groupNo)) {
        $conditions[] = "a.group_no = :search_by_groupNo";
    }
    if (!empty($search_by_tgroup)) {
        $conditions[] = "a.training_group = :search_by_tgroup";
    }
    if (!empty($search_by_docs)) {
        $conditions[] = "b.main_doc = :search_by_docs";
    }

    if (!empty($search_by_filename)) {
        $conditions[] = "file_name = :search_by_filename";
    }
    if (!empty($search_by_filename) && !empty($search)) {
        $conditions[] = "file_name = :search_by_filename AND a.training_group = :search";
    }
    if (!empty($conditions)) {
        $sql .= " AND " . implode(" AND ", $conditions);
    }

    $sql .= " ORDER BY a.id ASC LIMIT :limit OFFSET :offset";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':uploader_name', $uploader_name, PDO::PARAM_STR);
    $stmt->bindParam(':limit', $rowsPerPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);

    if (!empty($status)) {
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    }
    if (!empty($year)) {
        $stmt->bindParam(':year', $year);
    }
    if (!empty($month)) {
        $stmt->bindParam(':month', $month);
    }

    // if (!empty($date_from) && !empty($date_to)) {
    //     $stmt->bindParam(':date_from', $date_from, PDO::PARAM_STR);
    //     $stmt->bindParam(':date_to', $date_to, PDO::PARAM_STR);
    // }

    if (!empty($search_by_serialNo)) {
        $stmt->bindParam(':search_by_serialNo', $search_by_serialNo, PDO::PARAM_STR);
    }
    if (!empty($search_by_batchNo)) {
        $stmt->bindParam(':search_by_batchNo', $search_by_batchNo, PDO::PARAM_STR);
    }
    if (!empty($search_by_groupNo)) {
        $stmt->bindParam(':search_by_groupNo', $search_by_groupNo, PDO::PARAM_STR);
    }
    if (!empty($search_by_tgroup)) {
        $stmt->bindParam(':search_by_tgroup', $search_by_tgroup, PDO::PARAM_STR);
    }
    if (!empty($search_by_docs)) {
        $stmt->bindParam(':search_by_docs', $search_by_docs, PDO::PARAM_STR);
    }

    if (!empty($search_by_filename)) {
        $stmt->bindParam(':search_by_filename', $search_by_filename, PDO::PARAM_STR);
    }

    // if (!empty($search_by_filename) && !empty($search)) {
    //     $stmt->bindParam(':search_by_filename', $search_by_filename, PDO::PARAM_STR);
    //     $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    // }

    $stmt->execute();

    // get the isAllow from m_accounts
    $sql = "SELECT * FROM m_accounts WHERE fullname = :fullname";
    $acc = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $acc->bindParam(':fullname', $uploader_name);
    $acc->execute();
    $user = $acc->fetch(PDO::FETCH_ASSOC);

    $c = $offset + 1;
    $data = '';

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $k) {
            $status_text = strtoupper(htmlspecialchars($k['global_status']));
            $checked_date = !empty($k['checked_date']) ? date('Y/m/d', strtotime($k['checked_date'])) : '';
            $approved_date = !empty($k['approved_date']) ? date('Y/m/d', strtotime($k['approved_date'])) : '';
            $uploader_id = $k['uploader_id'];
            $tgroup = $k['training_group'];
            $serial_no = $k['serial_no'];
            $id = $k['id'];

            // Set background color based on status
            $status_bg_color = '';
            // $status_badge_color = '';
            switch ($status_text) {
                case 'APPROVED':
                    $status_bg_color = 'background-color: var(--success); color: #fff;';
                    // $status_badge_color = 'badge-success';
                    break;
                case 'FOR CHECKING': //PENDING
                    $status_bg_color = 'background-color: var(--warning);';
                    // $status_badge_color = 'badge-secondary';
                    break;
                case 'DISAPPROVED':
                    $status_bg_color = 'background-color: var(--danger); color: #fff;';
                    // $status_badge_color = 'badge-danger';
                    break;
                case 'FOR APPROVAL':
                    $status_bg_color = 'background-color: var(--primary); color: #fff;';
                    // $status_badge_color = 'badge-danger';
                    break;
                default:
                    $status_bg_color = 'background-color: var(--secondary);';
                    // $status_badge_color = 'badge-primary';
                    break;
            }

            $file_path = '../../../uploads/ereport/' . ($k['serial_no']) . '/';
            $file_path .= ($k['main_doc']) . '/';

            // Check if 'for approval' or 'for checking' folders exist and have files
            $sub_doc_path = !empty($k['sub_doc']) ? $file_path . $k['sub_doc'] . '/' : $file_path;
            // $filename = !empty($k['uploader_updated_file']) ? $k['uploader_updated_file'] : (!empty($k['updated_file']) ? $k['updated_file'] : $k['file_name']);
            $filename = !empty($k['updated_file']) ? $k['updated_file'] : $k['file_name'];
            $filenames = $k['file_name'];

            if ($status_text == 'APPROVED' || $status_text == 'DISAPPROVED' ) {
                $data .= '<tr style="' . $status_bg_color . '">';
            }else{
                if(!empty($user['isAllow'])){
                    $data .= '<tr style="' . $status_bg_color . ' cursor: pointer;" data-toggle="modal" data-target="#update_upload" onclick="getUpdateData(&quot;' . $k['id'] . '~!~' . $k['serial_no'] . '~!~' . $filenames . '~!~' . $status_text . '~!~' . $k['batch_no'] . '~!~' . $k['group_no'] . '~!~' . $k['upload_month'] . '~!~' . $k['upload_year'] . '~!~' . $k['main_doc'] . '~!~' . $k['training_group'] . '&quot;);">';
                }else{
                    $data .= '<tr style="' . $status_bg_color . '">';
                }
            }
            $data .= '<td>' . $c . '</td>';
            // $data .= '<td><i class="fas fa-trash" style="color:var(--danger); font-size: 12px; cursor:pointer;"></i></td>';
            $data .= '<td ><span>' . $status_text . '</span></td>';
            $data .= '<td >' . htmlspecialchars($k['serial_no']) . '</td>';
            $data .= '<td>' . htmlspecialchars($k['batch_no']) . '</td>';
            $data .= '<td>' . htmlspecialchars($k['group_no']) . '</td>';
            $data .= '<td>' . htmlspecialchars($k['upload_month']) . '</td>';
            $data .= '<td>' . htmlspecialchars($k['upload_year']) . '</td>';
            $data .= '<td>' . htmlspecialchars($k['main_doc']) . '</td>';
            $data .= '<td>' . htmlspecialchars($k['training_group']) . '</td>';

            if ($status_text == 'DISAPPROVED') {
                if ($file_path) {
                    $data .= '<td><a class="text-warning" href="../../pages/uploader/file_view.php?id=' . $id . '&serial_no=' . $serial_no . '&training_group=' . $tgroup . '&file_path=' . $file_path . '&uploader=' . $uploader_id . '" >' . $filename . '</a></td>';
                } else {
                    $data .= '<td>File not found</td>';
                }
            } else {
                if ($status_text == 'APPROVED' || $status_text == 'FOR APPROVAL') {
                    $data .= '<td title="' . $filenames . '">' . (strlen($filenames) > 50 ? substr($filenames, 0, 50) . '...' : $filenames) . '</td>';
                } else {
                    // PENDING: allow to delete row
                    $data .= '<td onclick="del(&quot;' . $k['id'] . '~!~' . $k['serial_no'] . '~!~' . $filenames . '&quot;);" data-toggle="modal" data-target="#delete_pending" style="cursor: pointer;" title="' . $filenames . '">' . (strlen($filenames) > 50 ? substr($filenames, 0, 50) . '...' : $filenames) . '</td>';
                }
            }

            $data .= '<td>' . htmlspecialchars($k['checker_name']) . '</td>';
            $data .= '<td>' . htmlspecialchars($checked_date) . '</td>';
            '<td><span>' . strtoupper(htmlspecialchars($k['approver_status'])) . '</span></td>'; // hidden to table
            $data .= '<td>' . htmlspecialchars($k['approver_name']) . '</td>';
            $data .= '<td>' . htmlspecialchars($approved_date) . '</td>';
            $data .= '<td>' . htmlspecialchars($k['global_comment']) . '</td>';

            // Display disapprover name if approver status is 'Disapproved'
            if ($status_text == 'DISAPPROVED') {
                $data .= '<td>' . htmlspecialchars($k['disapprover_name']) . '</td>';
            } else {
                $data .= '<td></td>';
            }

            $data .= '</tr>';
            $c++;
        }
    } else {
        $data .= '<tr style="text-align:center;"><td colspan="12">No records found.</td></tr>';
    }

    // Check if there are more rows beyond the current page
    $nextOffset = $offset + $rowsPerPage;
    $stmt->bindParam(':offset', $nextOffset, PDO::PARAM_INT);

    if (!empty($status)) {
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    }

    if (!empty($date_from) && !empty($date_to)) {
        $stmt->bindParam(':date_from', $date_from, PDO::PARAM_STR);
        $stmt->bindParam(':date_to', $date_to, PDO::PARAM_STR);
    }

    if (!empty($search)) {
        $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    }

    $stmt->execute();
    $has_more = $stmt->rowCount() > 0;

    echo json_encode(['html' => $data, 'has_more' => $has_more]);
}

if ($method == 'del_data_pending') {
    $id = $_POST['id'];
    $serial_no = $_POST['serial_no'];

    try {

        $sql_del_tr = "DELETE FROM t_training_record WHERE id = :id AND serial_no = :serial_no";
        $stmt_tr = $conn->prepare($sql_del_tr);
        $stmt_tr->bindParam(':id', $id);
        $stmt_tr->bindParam(':serial_no', $serial_no);
        $result_tr = $stmt_tr->execute();

        $sql_del_tf = "DELETE FROM t_upload_file WHERE id = :id AND serial_no = :serial_no";
        $stmt_tf = $conn->prepare($sql_del_tf);
        $stmt_tf->bindParam(':id', $id);
        $stmt_tf->bindParam(':serial_no', $serial_no);
        $result_tf = $stmt_tf->execute();

        if ($result_tr && $result_tf) {
            echo 'success';
        } else {
            echo 'error';
        }
    } catch (PDOException $e) {
        echo 'error';
    }
}
