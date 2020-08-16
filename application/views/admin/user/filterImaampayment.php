          <div class="card">
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
                        <!-- <a href="<?=base_url(); ?>admin/main/editimampayment/<?=$list->id ?>" class="btn btn-warning">Edit</a>   -->
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