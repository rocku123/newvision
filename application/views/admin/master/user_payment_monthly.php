<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Monthly Payment Lists</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Monthly Payment Lists</li>
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
                <h3 class="card-title">Add User Monthly Payment</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: none;">
                  <form role="form" id="userPaymentForm" novalidate="novalidate">
                    <div class="card-body">
                    <div class="form-group">
                          <label>Select User</label>
                          <select class="form-control select2" name="user_id"  style="width: 100%;">
                            <option value="" selected="selected">Select User</option>
                            <?php foreach($users as $user){ ?>
                              <option value="<?=$user->id  ?>"><?=$user->firstname." ".$user->lastname  ?></option>
                            <?php  }  ?>  
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Monthly Fixed Amount</label>
                        <input type="number" name="fix_amount" class="form-control" id="fix_amount" placeholder="Enter Amount">
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

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Monthly Payment Lists</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>User Name</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php 
                if($lists){
                  $i=1;
                foreach($lists as $list) {   ?>
                    <tr>
                        <td><?=$i  ?></td>
                        <td><?=$list->firstname." ".$list->lastname  ?></td>
                        <td><?=$list->fix_amount  ?></td>
                        <td>
                        <a href="<?=base_url(); ?>admin/master/edituserPayment/<?=$list->id ?>" class="btn btn-warning">Edit</a>  
                        <a href="<?=base_url(); ?>admin/master/deleteuserPayment/<?=$list->id ?>" class="btn btn-danger">Delete</a>
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

 