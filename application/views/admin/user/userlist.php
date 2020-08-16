<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Lists</li>
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
                <h3 class="card-title">Add User</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: none;">
                  <form role="form" id="userForm" novalidate="novalidate">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Fistname</label>
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter First Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Lastname</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Last Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Select UserType</label>
                        <select class="form-control" name="usertype">
                          <?php foreach($usertype as $type){ ?>
                           <option value="<?=$type->id  ?>"><?=$type->name ?></option>
                          <?php }  ?>
                        </select>
                      </div>
                      <div class="form-group mb-0">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="member" value="1" class="custom-control-input" id="exampleCheck1">
                          <label class="custom-control-label" for="exampleCheck1">Member.</label>
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

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Lists</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>FistName</th>
                    <th>LastName</th>
                    <th>Email</th>
                    <th>UserType</th>
                    <th>Member</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php 
                if($lists){
                foreach($lists as $list) {   ?>
                    <tr>
                        <td><?=$list->firstname  ?></td>
                        <td><?=$list->lastname  ?></td>
                        <td><?=$list->email  ?></td>
                        <td><?=$list->usertype  ?></td>
                        <td><?=$list->member  ?></td>
                        <td>
                        <a href="<?=base_url(); ?>admin/main/editUser/<?=$list->id ?>" class="btn btn-warning">Edit</a>  
                        <a href="<?=base_url(); ?>admin/main/deleteUser/<?=$list->id ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php  
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

 