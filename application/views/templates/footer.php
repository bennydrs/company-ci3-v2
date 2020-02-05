<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; BDS <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>sweetalert/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>sweetalert/js/myscript.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/'); ?>editable/js/bootstrap-editable.min.js"></script>

<script>
    // input image
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // $(document).ready(function() {
    //     /* Initialise the DataTable */
    //     var oTable = $('#data').dataTable({
    //         "oLanguage": {
    //             "sSearch": "Cari:"
    //         },
    //         "iDisplayLength": 10,
    //         "bJQueryUI": true,
    //         "sPaginationType": "full_numbers",
    //         "bFilter": true,
    //     });

    //     /* Add a select menu for each TH element in the table footer */
    //     $("thead th").each(function(i) {
    //         this.innerHTML = fnCreateSelect(oTable.fnGetColumnData(i));
    //         $('select', this).change(function() {
    //             oTable.fnFilter($(this).val(), i);
    //         });
    //     });
    // });
</script>

<!-- <script type="text/javascript">
    var save_method; //for save method string
    var table;

    $(document).ready(function() {
        //datatables
        table = $('#mytable').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?php echo base_url('employee/get_employee_json'); ?>',
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columns": [{
                    "data": "e_id_number",
                    width: 100
                },
                {
                    "data": "name",
                    width: 100
                },
                {
                    "data": "name_position",
                    width: 100
                },
                {
                    "data": "email",
                    width: 100
                },
                {
                    "data": "sex",
                    width: 100
                },
                {
                    "data": "action",
                    width: 100
                }
            ],

        });

    });
</script> -->



</body>

</html>