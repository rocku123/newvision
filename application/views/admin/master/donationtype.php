<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expense</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('admin/')?>">Home</a></li>
              <li class="breadcrumb-item active">Donation Type</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Donation Type</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: none;">
                  <form role="form" id="masterForm" action="<?=base_url('admin/master/add_donationtype_act')?>" novalidate="novalidate" method="post">
                    <div class="card-body">
                      <div class="row">
                            <div class="col-lg-6 col-sm-6">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" name="name" class="form-control" id="amount" placeholder="Enter Name">
                            </div>
                        </div> 
                    </div>
                      <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-12">
           

            <div class="card" id="filterdata">
              <div class="card-header">
                <h3 class="card-title">Donation Type</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Date</th>
                    <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                <?php 
                if($lists){
                  $i=1;
                foreach($lists as $list) {   ?>
                    <tr>
                        <td><?=$i  ?></td>
                        <td><?=$list->name  ?></td>
                        <td><?=$list->created_at  ?></td>
                        <td>
                        <!-- <a href="<?=base_url(); ?>admin/expense/editExpense/<?=$list->id ?>" class="btn btn-warning">Edit</a>   -->
                        <a href="<?=base_url(); ?>admin/master/deleteDonatiotype/<?=$list->id ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php  
                 $i++;
                    }
                }
                else{
                    echo "<tr><td> No Records Found  </td>  </tr>";
                }   
                ?> 
                  </tfoot>
                </table>
                  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

 