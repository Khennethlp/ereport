<?php require 'process/login.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <link rel="icon" href="dist/img/e-report-icon.png" type="image/x-icon" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="dist/css/font.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<!-- background-color: #306BAC; -->

<body>
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="row mb-2">
                        <div class="col-md-9">
                            <div class="flex-column justify-content-center align-items-center">
                                <img src="dist/img/e-report-bg.png" alt="logo" class="logo" height="65" width="65">
                                <span class="h2 logo-text">E-REPORT</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-3 mt-3 float-right">
                                <a href="login.php" class="btn btn-info" style="background: #275DAD;">LOGIN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="col-md-12 m-0 p-0">
                <div class="card" style="border-top: 2px solid #1e96fc;">
                    <div class="card-header">
                        <h3 class="card-title"><img src="dist/img/table.png" height="35" width="35">&ensp;VIEWER TABLE</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 mb-2">
                                <label for="">Search By Serial No:</label>
                                <input type="search" class="form-control" name="" id="search_by_serialNo" placeholder="">
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="">Search By Batch No:</label>
                                <input type="search" class="form-control" name="" id="search_by_batchNo" placeholder="">
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="">Search By Group No:</label>
                                <input type="search" class="form-control" id="search_by_groupNo">
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="">Search By Training Group:</label>
                                <!-- <input type="search" class="form-control" name="" id="search_by_tgroup" placeholder=""> -->
                                <select class="form-control" name="search_by_tgroup" id="search_by_tgroup">
                                    <option value=""></option>
                                    <?php
                                    require 'process/conn.php';

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
                            <div class="col-md-2 mb-2">
                                <label for="">Search By Document:</label>
                                <!-- <input type="search" class="form-control" name="" id="search_by_docs" placeholder=""> -->
                                <select class="form-control" name="search_by_docs" id="search_by_docs">
                                    <option value="" selected></option>
                                    <?php
                                    require 'process/conn.php';

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
                            <div class="col-md-2 mb-2">
                                <label for="">Search By Filename:</label>
                                <input type="search" class="form-control" name="" id="search_by_filename" placeholder="">
                            </div>
                            <div class="col-md-2 mb-2">
                                <!-- <label for="">From:</label> -->
                                <!-- <input type="date" class="form-control" name="" id="search_by_date_from"> -->
                                <label for="">Month:</label>
                                <!-- <input type="date" id="search_date_from" class="form-control"> -->
                                <select name="search_by_date_from" id="search_by_month" class="form-control">
                                    <option value=""></option>
                                    <option value="January">JANUARY</option>
                                    <option value="February">FEBRUARY</option>
                                    <option value="March">MARCH</option>
                                    <option value="April">APRIL</option>
                                    <option value="May">MAY</option>
                                    <option value="June">JUNE</option>
                                    <option value="July">JULY</option>
                                    <option value="August">AUGUST</option>
                                    <option value="September">SEPTEMBER</option>
                                    <option value="October">OCTOBER</option>
                                    <option value="November">NOVEMBER</option>
                                    <option value="December">DECEMBER</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="">Year:</label>
                                <!-- <input type="date" class="form-control" name="" id="search_by_date_to"> -->
                                <select name="search_by_date_to" id="search_by_year" class="form-control">
                                    <option value=""></option>
                                    <?php
                                    $currentYear = date('Y');
                                    for ($i = $currentYear; $i <= $currentYear + 10; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    // ' . ($i == $currentYear ? ' selected' : '') . '
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="">&nbsp;</label>
                                <button class="form-control" style="background: #275DAD; color: #fff;" onclick="load_data(); counts();">
                                    <i class="fas fa-search"></i>&nbsp;
                                    Search
                                </button>
                            </div>

                            <!-- FOR WORK INSTRUCTION -->
                            <!-- <div class="col-md-2 mb-2">
                                <label for="">&nbsp;</label>
                                <a href="" class="form-control bg-danger text-center"><i class="fas fa-download"></i>&nbsp; Work Instruction</a>
                            </div> -->
                        </div>
                        <br>
                        <div class="col-12">
                            <div class="card-body table-responsive p-0" style="height: 550px;">
                                <table class="table table-head-fixed text-nowrap" id="employee_data">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Serial No.</th>
                                            <th>Batch No.</th>
                                            <th>Group No.</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Document</th>
                                            <th>Training Group</th>
                                            <th>Filename</th>
                                            <!-- <th>Checked By</th>
                                            <th>Checked Date</th>
                                            <th>Approved By</th>
                                            <th>Approved Date</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="admin_dashboard_table"></tbody>
                                </table>
                            </div>
                            <div id="load_more" class="text-center" style="display: none;">
                                <p class="badge badge-dark border border-outline px-4 py-3 mt-3 " style="cursor: pointer;">Load More...</p>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="row">
                                <span id="approved_count" class="text-bold"></span>
                            </div>
                        </div>
                    </div>
        </section>
    </div>

    <div style="text-align: center;">
        <footer class="content-fluid">
            <strong>Copyright &copy; 2024. Khenneth Puerto </strong>
            All rights reserved.
            <div class=" d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>

    <?php include 'index_script.php'; ?>
    <!-- jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

</body>

</html>