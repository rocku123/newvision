<?php
$ci = & get_instance();
$controller = $ci->uri->segment(2);
$controller = strtolower($controller);
?>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url() ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url() ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url() ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- jquery-validation -->
<script src="<?=base_url() ?>assets/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?=base_url() ?>assets/admin/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url() ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url() ?>assets/admin/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  })
</script>
<?php
    // if(is_localhost()){ //echo 1; exit;
    //      $url ="E:/xampp/htdocs/newvision/application/views/admin/js/".$controller.".php";
    // }else{ //echo 2; exit;
    //     $url = "/home/qq565iu2oil1/public_html/carzone/application/views/admin/js/".$controller.".php";
    //  }
    // $url = "/home/developerkaif/public_html/carzone/application/views/admin/js/".$controller.".php";
    $url ="C:/xampp/htdocs/noormasjid/application/views/admin/js/".$controller.".php";;
    if(file_exists($url))
    $this->load->view("admin/js/$controller"); 
?>
</body>
</html>
