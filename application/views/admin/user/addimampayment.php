<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Imaam payment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Imaam payment</li>
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
                <h3 class="card-title">Add Imaam payment</h3>

                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i> -->
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                  <form role="form" id="paymentForm" novalidate="novalidate">
                      <div class="card-body">
                        <div class="row">
                              <div class="col-lg-5 col-sm-4">
                                <label for="exampleInputEmail1">Select User</label>
                                <select class="form-control select2" name="user_id" id="userId"  style="width: 100%;">
                                    <option value="" selected="selected">Select User</option>
                                    <?php foreach($users as $user){ ?>
                                        <option value="<?=$user->id  ?>"><?=$user->firstname." ".$user->lastname ?></option>
                                    <?php  }  ?> 
                                </select>
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                <label for="exampleInputEmail1">Select Month</label>
                                <select class="form-control select2" name="month_id"  style="width: 100%;">
                                    <option value="" selected="selected">Select Month</option>
                                    <?php foreach($monthlist as $month){
                                      $selected = $month->id==$c_month?"selected":"";
                                      ?>
                                        <option value="<?=$month->id  ?>" <?=$selected ?> ><?=$month->name ?></option>
                                    <?php  }  ?> 
                                </select>
                              </div>
                              <div class="col-lg-3 col-sm-4">
                                <label for="exampleInputEmail1">Amount</label>
                                <input type="number" name="amount" id="FixAmount" class="form-control" id="amount" placeholder="Enter Amount">
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
         
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

 