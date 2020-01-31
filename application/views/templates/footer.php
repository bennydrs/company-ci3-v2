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
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/'); ?>sweetalert/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>jquerymask/jquery.mask.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/'); ?>sweetalert/js/myscript.js"></script>
<script src="<?= base_url('assets/'); ?>editable/js/bootstrap-editable.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/ckeditor.js"></script>

<script>
    // input image
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });


    // change access
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: "post",
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
</script>

<script>
    // Format mata uang.
    $(document).ready(function() {
        $('.money').mask('000.000.000', {
            reverse: true
        });

    })
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


    // <!-- count absent realtime -->
    (function() {
        "use strict";

        $("table").on("change", "input", function() {
            var row = $(this).closest("tr");
            var qty = parseFloat(row.find("#present").val());
            var price = parseFloat(row.find("#permission").val());
            var x = parseFloat(row.find("#alpha").val());
            var total = qty + price + x;
            row.find("#total").val(isNaN(total) ? "" : total);
        });
    })();

    $(".readonly").on('keydown paste', function(e) {
        e.preventDefault();
    });
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
    $(document).ready(function() {
        $('.present').editable({
            validate: function(value) {
                if ($.trim(value) == '') {
                    return 'This field is required';
                }
                var regex = /^[0-9]+$/;
                if (!regex.test(value)) {
                    return 'Numbers only!';
                }

            }
        });
    });
</script>

<script>
    $(function() {
        $('.absen tbody tr').each(function() {
            var pct = parseInt($('.p', this).text());

            var winy = parseInt($('#izin', this).text());
            // var losy = parseInt($('.data-l', this).text(), 10);

            var jumlah = (pct) + (winy);
            // $('.data-pct', this).text(pkt);
            $('#jumlah', this).append(jumlah)

        });
    })

    ClassicEditor
        .create(document.querySelector('#content-info'))
        .catch(error => {
            console.error(error);
        });
</script>


</body>

</html>