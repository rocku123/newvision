<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quik Donate</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quik Donate</li>
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
                <h3 class="card-title">Quik Donate</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: none;">
                  <form role="form" id="donationForm" novalidate="novalidate">
                    <div class="card-body">
                    <div class="form-group">
                          <label>Select Donation Type</label>
                          <select class="form-control select2" name="donation_type"  style="width: 100%;">
                            <option value="" selected="selected">Select Donation Type</option>
                            <?php foreach($donation_type as $type){ ?>
                              <option value="<?=$type->id  ?>"><?=$type->name  ?></option>
                            <?php  }  ?>  
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Amount</label>
                        <input type="number" name="amount" class="form-control" id="amount" placeholder="Enter Amount">
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
              </div>
              <div class="card-body">
              <form role="form" id="filterForm" novalidate="novalidate"> 
                <div class="row">
                  <div class="col-lg-3 col-sm-6">
                      <label for="exampleInputEmail1">From Date</label>
                      <input type="date" class="form-control" placeholder="From Date" name="fromDate">
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <label for="exampleInputEmail1">To Date</label> 
                      <input type="date" class="form-control" placeholder="To Date" name="toDate">
                  </div>
                  <div class="col-lg-4 col-sm-6">
                    <label for="exampleInputEmail1">Donation Type</label>
                    <select class="form-control select2" name="donation_type"  style="width: 100%;">
                        <option value="" selected="selected">Select Donation Type</option>
                        <?php foreach($donation_type as $type){ ?>
                          <option value="<?=$type->id  ?>"><?=$type->name  ?></option>
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

            <div class="card" id="filterdata1">
              <div class="card-header">
                <h3 class="card-title">Donation Lists</h3>
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
                    <th>Doantion Type</th>
                    <th>Amount</th>
                    <th>Date</th>
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
                        <td><?=$list->name  ?></td>
                        <td><?=$list->amount  ?></td>
                        <td><?=$list->date  ?></td>
                        <td>
                        <a href="<?=base_url(); ?>admin/donation/editDonate/<?=$list->id ?>" class="btn btn-warning">Edit</a>  
                        <a href="<?=base_url(); ?>admin/donation/deleteDonate/<?=$list->id ?>" class="btn btn-danger">Delete</a>
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

 