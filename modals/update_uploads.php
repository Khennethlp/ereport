
<div class="modal fade bd-example-modal-xl" id="update_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">
                    <b>UPDATE UPLOAD</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="col-md-12">
                <div class="row mb-2">
                    <input type="hidden" class="form-control" id="update_id" readonly>
                    <div class="col-md-3">
                        <label for="">Status:</label>
                        <input type="text" class="form-control" id="update_status" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="">Serial No:</label>
                        <input type="text" class="form-control" id="update_serialNo" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="">Batch No:</label>
                        <input type="text" class="form-control" id="update_batchNo" >
                    </div>
                    <div class="col-md-3">
                        <label for="">Group No:</label>
                        <input type="text" class="form-control" id="update_groupNo" >
                        <!-- <input type="text" list="update_groupNo" class="update_group form-control" placeholder="">
                        <datalist id="update_groupNo">
                            <?php
                            require '../../process/conn.php';
                            $sql = "SELECT DISTINCT group_no FROM t_training_record ";
                            $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                            $stmt->execute();

                            if ($stmt->rowCount() > 0) {
                                // Output data of each row
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                // Output data of each row
                                foreach ($rows as $row) {

                                    echo '<option value="' . $row["group_no"] . '">' . $row["group_no"] . '</option>';
                                }
                            } else {
                                echo '<option value="">No data available</option>';
                            }
                            ?>
                        </datalist> -->
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label for="">Month:</label>
                        <!-- <input type="text" class="form-control" id="update_month" > -->
                        <select name="update_month" id="update_month" class="form-control">
                            <option value=""></option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Year:</label>
                        <input type="text" class="form-control" id="update_year" >
                    </div>
                    <div class="col-md-3">
                        <label for="">Document:</label>
                        <!-- <input type="text" class="form-control" id="update_docs" > -->
                        <select class="form-control" name="update_doc" id="update_docs">
                            <option value="" selected></option>
                            <?php
                            require '../../process/conn.php';

                            $sql = "SELECT DISTINCT main_doc FROM m_report_title";
                            $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                            $stmt->execute();

                            if ($stmt->rowCount() > 0) {
                                // Output data of each row
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                // Output data of each row
                                foreach ($rows as $row) {
                                    echo '<option value="' . $row["main_doc"] . '">' . $row["main_doc"] . '</option>';
                                }
                            } else {
                                echo '<option value="">No data available</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Training Group:</label>
                        <!-- <input type="text" class="form-control" id="update_tgroup" > -->
                        <select class="form-control" name="update_tgroup" id="update_tgroup">
                            <option value=""></option>
                            <?php
                            require '../../process/conn.php';

                            $sql = "SELECT DISTINCT training_title FROM t_training_group";
                            $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                            $stmt->execute();

                            if ($stmt->rowCount() > 0) {
                                // Output data of each row
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                // Output data of each row
                                foreach ($rows as $row) {
                                    echo '<option value="' . $row["training_title"] . '">' . $row["training_title"] . '</option>';
                                }
                            } else {
                                echo '<option value="">No data available</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <label for="">Filename:</label>
                        <input type="text" class="form-control" id="update_filename">
                    </div>
                </div>
               </div>
              
            </div>
            <div class="modal-footer ">
                <div class="col-sm-3">
                    <?php
                    $user = isset($_SESSION['name']) && $_SESSION['role'] == 'uploader' ;
                    if($user){
                        // echo '<button class="btn  btn-block" onclick="" style="background: var(--danger) !important;color:#fff;height:34px;border-radius:.25rem;font-size:15px;font-weight:normal; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);">Close</button>';
                        echo '<button class="btn  btn-block" onclick="update_upload_pending();" style="background: #3765AA !important;color:#fff;height:34px;border-radius:.25rem;font-size:15px;font-weight:normal; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);">Update</button>';
                    }else{
                        echo '<button class="btn  btn-block" onclick="" style="background: #3765AA !important;color:#fff;height:34px;border-radius:.25rem;font-size:15px;font-weight:normal; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);">Submit</button>';
                    }
                    ?>
                   
                    <!-- <button class="btn  btn-block" onclick="" style="background: #3765AA !important;color:#fff;height:34px;border-radius:.25rem;font-size:15px;font-weight:normal; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);">Submit</button> -->
                </div>
            </div>
        </div>
    </div>
</div>