<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Imam Payment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Imam Payment</li>
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
                <h3 class="card-title">Imam Payment</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: none;">
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
          <div class="col-12">
            <div class="card card-danger">
              <div class="card-header">
                  <h3 class="card-title">Filter the Records</h3>
                  <a href="<?=base_url()?>admin/expense/expense" class="btn btn-success" style="float:right">Clear</a>
              </div>
              <div class="card-body">
              <form role="form" id="filterForm" novalidate="novalidate"> 
                <div class="row">
                  <div class="col-lg-3 col-sm-6">
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
                  <div class="col-lg-3 col-sm-6">
                      <label for="exampleInputEmail1">Select Year</label>
                      <select class="form-control select2" name="year"  style="width: 100%;">
                          <option value="" selected="selected">Select Year</option>
                          <?php for($i=2018;$i<=2030;$i++){
                            $selected = $i==$c_year?"selected":"";
                            ?>
                            <option value="<?=$i  ?>" <?=$selected ?> ><?=$i ?></option>
                          <?php  }  ?> 
                      </select>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <label for="exampleInputEmail1">Select User</label>
                      <select class="form-control select2" name="user_id"  style="width: 100%;">
                          <option value="" selected="selected">Select User</option>
                          <?php foreach($users as $user){ ?>
                              <option value="<?=$user->id  ?>"><?=$user->firstname." ".$user->lastname ?></option>
                          <?php  }  ?> 
                      </select>
                  </div>
                  <div class="col-lg-2 col-sm-6">
                    <label for="exampleInputEmail1">-</label>
                    <!-- <input type="submit" class="form-control" placeholder="To Date" name="toDate">  -->
                    <button type="submit" class="form-control btn btn-primary">Filter</button>
                  </div>
                </form>  
                </div>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card" id="filterdata">
              <div class="card-header">
                <h3 class="card-title">Imam Payment Lists</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th>Total</th>
                    <th><?=$total->amount ?></th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                </table>
                </br> 
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>User Name</th>
                    <th>Paid Amount</th>
                    <th>Remaing/Extra Amount</th>
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
                        <td><?=$list->firstname." ".$list->firstname  ?></td>
                        <td><?=$list->amount  ?></td>
                        <td><?=$list->amount - $list->fix_amount  ?></td>
                        <td>
                        <a href="<?=base_url(); ?>admin/expense/deleteimampayment/<?=$list->id ?>" class="btn btn-danger">Delete</a>
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

 