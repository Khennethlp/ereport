<div class="modal fade bd-example-modal-xl" id="add_docs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">
                    <b>Add New Document</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-2">
                    <label for="">Main Document:</label>
                    <!-- <input type="text" id="main_doc" class="form-control" placeholder="e.g. Trainers Evaluation Results..."> -->
                    <select class="form-control" name="main_doc" id="main_doc">
                        <option value="" selected>--SELECT DOCUMENT--</option>
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
                <div class="col-md-12">
                    <label for="">Sub Document:</label>
                    <input type="text" id="sub_doc" class="form-control" placeholder="e.g. Theory Training...">
                    <!-- <p class="text-green text-sm">Sub Document can be empty.</p> -->
                </div>


            </div>
            <div class="modal-footer ">
                <div class="col-sm-3">
                    <button class="btn btn-block" onclick="add_reports();" style="background: #3765AA !important;color:#fff;height:34px;border-radius:.25rem;font-size:15px;font-weight:normal; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>