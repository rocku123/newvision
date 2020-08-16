<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=base_url() ?>assets/admin/dist/img/noori-masjid-logo-1.png" alt="Image" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Noori Masjid</span>
    </a>
  <?php $userType = $this->session->userdata('usertype');  ?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url() ?>assets/admin/dist/img/noori-masjid-logo-1.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$this->session->userdata('firstname')." ".$this->session->userdata('lastname') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="<?=base_url() ?>admin/main/index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
        </li>
    <?php if($userType==3 || $userType==1){  ?>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Donation Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url() ?>admin/donation/donate" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quik Donation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url() ?>admin/donation/userDonation" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Donation</p>
                </a>
              </li>
            </ul>
        </li>
        
        <li class="nav-item">
            <a href="<?=base_url() ?>admin/main/imampaymentList" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Imam Paymnet
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=base_url() ?>admin/expense/expense" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Expense Management
              </p>
            </a>
        </li>
        

        <li class="nav-item">
            <a href="<?=base_url() ?>admin/main/userList" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                User Management
              </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Master Mangement
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url() ?>admin/master/userPayment" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Monthly Payment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url() ?>admin/master/donationtype" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Donation Type Lists</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url() ?>admin/master/expensetype" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expense Type Lists</p>
                </a>
              </li>
            </ul>
          </li>
    <?php } ?>
          <li class="nav-item">
            <a href="<?=base_url() ?>admin/logout" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Logout
              </p>
            </a>
        </li>
        <!-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
        </li> -->
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>