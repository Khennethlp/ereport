<?php
include '../../process/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method']) && $_POST['method'] == 'update_uploads') {

    $id = $_POST['id'];
    $serialNo = $_POST['serialNo'];
    $batchNo = $_POST['batchNo'];
    $groupNo = $_POST['groupNo'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $docs = $_POST['docs'];
    $training_group = $_POST['training_group'];
    $filename = $_POST['filename'];

    try{
        $sql_upload_file = "UPDATE t_upload_file SET file_name = :file, main_doc = :main_doc WHERE serial_no = :serial_no AND id = :id";
        $stmt_upload_file = $conn->prepare($sql_upload_file);
        $stmt_upload_file->bindParam(':file', $filename, PDO::PARAM_STR);
        $stmt_upload_file->bindParam(':main_doc', $docs, PDO::PARAM_STR);
        $stmt_upload_file->bindParam(':serial_no', $serialNo, PDO::PARAM_STR);
        $stmt_upload_file->bindParam(':id', $id, PDO::PARAM_INT);
        
        if($stmt_upload_file->execute()){

            $sql_training_record = "UPDATE t_training_record SET batch_no = :batchNo, group_no = :groupNo, upload_month = :upload_month, upload_year = :upload_year, training_group = :training_group WHERE serial_no = :serial_no AND id = :id";
            $stmt_training_record = $conn->prepare($sql_training_record);
            $stmt_training_record->bindParam(':batchNo', $batchNo, PDO::PARAM_STR);
            $stmt_training_record->bindParam(':groupNo', $groupNo, PDO::PARAM_STR);
            $stmt_training_record->bindParam(':upload_month', $month, PDO::PARAM_STR);
            $stmt_training_record->bindParam(':upload_year', $year, PDO::PARAM_STR);
            $stmt_training_record->bindParam(':training_group', $training_group, PDO::PARAM_STR);
            $stmt_training_record->bindParam(':serial_no', $serialNo, PDO::PARAM_STR);
            $stmt_training_record->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt_training_record->execute();

            echo 'success';
        }else{
            echo 'error';
        }
    
    }catch(PDOException $e)
    {
        echo 'Error: ' . $e->getMessage();
    }
}
