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
              <li class="breadcrumb-item active">Edit User Monthly Payment Lists</li>
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
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit User Monthly Payment</h3>

                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i> -->
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                  <form role="form" id="UpdateuserPaymentForm" novalidate="novalidate">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input type="text" value="<?=$list->firstname." ".$list->lastname  ?>" class="form-control" readonly>
                    </div>
                    <input type="hidden" value="<?=$list->id ?>" name="id" class="form-control" readonly>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Monthly Fixed Amount</label>
                        <input type="number" name="fix_amount" value="<?=$list->fix_amount  ?>" class="form-control" id="fix_amount" placeholder="Enter Amount">
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
         
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

 