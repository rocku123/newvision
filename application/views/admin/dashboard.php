<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Noori Masjid | Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url() ?>assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url() ?>assets/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <li class="nav-item">
        <a class="nav-link"   href="<?=base_url('admin/logout') ?>" >
         Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include('layout/sidebar.php')  ?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Available Amount</b></span>
                <span class="info-box-number">
                <Strong>Rs: </Strong>
                <?= total_amount() - total_expense() ?>
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-donate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Amount Collection</span>
                <span class="info-box-number">Rs: <?= total_amount() ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Expense</span>
                <span class="info-box-number">Rs: <?= total_expense() ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-hand-holding-usd"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Imaam Payment Collection</span>
                <span class="info-box-number">Rs: <?= imaamcollection() ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number"><?=total_user() ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
       

        <!-- Main row -->
        <?php if($userType==3 || $userType==1){  ?>
        <div class="row">
          

          <div class="col-md-3">
           
            <!-- /.info-box -->
            <a href="<?=base_url() ?>admin/donation/addDonation">
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="fas fa-donate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Quik Donation</span>
                <!-- <span class="info-box-number">92,050</span> -->
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
          </div>
          <div class="col-md-3">  
            <!-- /.info-box -->
            <a href="<?=base_url() ?>admin/donation/adduserDonation">
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fas fa-comments-dollar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Donation</span>
                <!-- <span class="info-box-number">114,381</span> -->
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
          </div> 

          <div class="col-md-3"> 
            <!-- /.info-box -->
            <a href="<?=base_url() ?>admin/expense/addExpense">
              <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="fas fa-money-check-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Add Expense</span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
          </div> 

          <div class="col-md-3"> 
            <!-- /.info-box -->
            <a href="<?=base_url() ?>admin/main/addimampayment">
              <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fas fa-hand-holding-usd"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Add Imaam Payment</span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
          </div>  
        </div>
        <?php }  ?>
         
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="#">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?=base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?=base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url() ?>assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url() ?>assets/admin/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?=base_url() ?>assets/admin/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?=base_url() ?>assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?=base_url() ?>assets/admin/plugins/raphael/raphael.min.js"></script>
<script src="<?=base_url() ?>assets/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?=base_url() ?>assets/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url() ?>assets/admin/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?=base_url() ?>assets/admin/dist/js/pages/dashboard2.js"></script>
</body>
</html>
