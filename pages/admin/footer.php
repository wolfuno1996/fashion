<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © Your Website 2018</small>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url()?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url()?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url()?>assets/admin/vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url()?>assets/admin/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="<?php echo base_url()?>assets/admin/js/sb-admin-datatables.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/js/sb-admin-charts.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/vendor/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/js/admin.js"></script>
<script type="text/javascript">
    function editProduct(id) {
        swal({
            title: "Are you sure?",
            text: "Are you sure want to edit this product!",
            icon: "warning",
            buttons: true,
        })
            .then((product) => {
                if (product) {
                    var url = window.location.href + '/'+id;
                    window.location = url;
                } else {

                }
            });

    }

    function deleteProduct(id) {
        swal({
            title: "Are you sure?",
            text: "Are you sure want to delete this product!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((product) => {
                if (product) {
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url()?>" + "admin/product/delete",
                        dataType: 'json',
                        data: {id: id}
                    }).done(function() {

                    }).fail(function() {

                    }).always(function(res) {
                        if(res=='Success'){
                            swal("Success!", "Delete Product!", "success");
                        }
                        else{
                            swal("Error!", "Delete Product Fail!", "error");
                        }
                    });
                } else {

                }
            });
    }

</script>

</div>
</body>

</html>