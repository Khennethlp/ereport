<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/preloader.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mt-2" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <input type="hidden" id="user_name" class="form-control" value="<?= $_SESSION['name']; ?>">
                                    <div class="col-md-3">
                                        <label for="">Date From:</label>
                                        <input type="date" name="" id="backup_date_from" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Date To:</label>
                                        <input type="date" name="" id="backup_date_to" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">&nbsp;</label>
                                        <button class="form-control" style="background-color: #275DAD; color: #fff;" onclick="backup();">Backup</button>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <label for="">Database Backup</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="border-radius: 15px; max-height: 550px; overflow-y:auto;">
                                    <table class="table table-condensed table-hover">
                                        <thead>
                                            <th>Backup Date Range</th>
                                            <th>Backup Date</th>
                                            <th>Initiator</th>
                                        </thead>
                                        <tbody id="backup_table">
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<?php 
include 'plugins/footer.php';
include 'plugins/js/backup_script.php';
?>