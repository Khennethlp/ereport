<div class="modal fade bd-example-modal-xl" id="checker_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">
                    <div class="row">
                        <label for="serial_label">Serial No:&nbsp;&nbsp; </label> 
                        <p id="serial_label"></p>
                        <input type="hidden" class="form-control" id="serial_no">
                        <input type="hidden" class="form-control" id="id_no">
                        <!-- <p id="id_no"></p> -->
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <div class="modal-body">
                <table class="table table-head-fixed text-nowrap table-hover text-center" id="modal_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>File(s)</th>
                        </tr>
                    </thead>
                    <tbody id="checker_modal_table"> </tbody>
                </table>

            </div>
          
        </div>
    </div>
</div>