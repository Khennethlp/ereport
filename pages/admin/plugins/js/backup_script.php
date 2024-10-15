<script>
    document.addEventListener("DOMContentLoaded", function() {
        load_backup();
    });

    const load_backup = () => {
        $.ajax({
            type: "POST",
            url: "../../process/backup/load_backup.php",
            // data: "data",
            success: function (response) {
                $('#backup_table').html(response);
            }
        });
    }

    const backup = () => {
        var initiator = document.getElementById('user_name').value;
        // var date_from = document.getElementById('backup_date_from').value;
        // var date_to = document.getElementById('backup_date_to').value;

        Swal.fire({
            title: "Ready for backup?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Lets Go!"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: "POST",
                    url: "../../process/backup/backup.php",
                    data: {
                        initiator: initiator,
                        // date_from: date_from,
                        // date_to: date_to
                    },
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            load_backup();
                        } else if (response == 'failed') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Failed to backup.',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            load_backup();
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Something went wrong.',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    }
                });
            }
        });
    }
</script>