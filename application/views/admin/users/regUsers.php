

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Clients</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Client</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>
          
          <!--<?php if(in_array('createUser', $user_permission)): ?>-->
          <!--  <a href="<?php echo base_url('users/create') ?>" class="btn btn-primary">Add User</a>-->
          <!--  <br /> <br />-->
          <!--<?php endif; ?>-->


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Clients</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Available Balance</th>
                  <th>Status</th>

                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($user_data): ?>                  
                    <?php $i=1; foreach ($user_data as $k => $v):
                    $status = $v['status'];
                    $id = $v['id'];?>
                    
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v['clt_name']; ?></td>
                        <td><?php if ($v['clt_email']=='') {
                          echo "No Mail";
                        }else{
                          echo $v['clt_email'];
                        } ?></td>
                        <td><?php echo $v['clt_conno']; ?></td>
                        <td><?= $v['cru_wall_bal'];?></td>
                        <td><?php if($v['status']=='1'){echo "<button class='btn btn-success' title='Click to diactive' onclick='clientStatus($status,$id)'>Active</button>";}else{echo "<button class='btn btn-danger' onclick='clientStatus($status,$id)'  title='Click to Active'>Diactive</button>";}?></td>
                        
                        <?php if(in_array('viewOrder', $user_permission) || in_array('deleteUser', $user_permission)): ?>

                        <td>
                          <?php if(in_array('deleteUser', $user_permission)): ?>
                            <a href="<?php echo base_url('users/deleteUsers/'.$v['id']) ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                          <?php endif; ?>
                          <?php if(in_array('viewOrder', $user_permission)): ?>
                            <a href="<?php echo base_url('users/orders/'.$v['id']) ?>" class="btn btn-default" title="View Orders"><i class="fa fa-shopping-cart"></i></a>
                          <?php endif; ?>
                          <?php if(in_array('viewOrder', $user_permission)): ?>
                            <a href="<?php echo base_url('users/trasection/'.$v['id']) ?>" class="btn btn-default" title="All Transection"><i class="fa fa-credit-card"></i></a>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                      </tr>
                    <?php $i++; endforeach ?>
                  <?php endif; ?>
                </tbody>
              </table></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <script type="text/javascript">
    $(document).ready(function() {
      $('#userTable').DataTable();

      $("#mainUserNav").addClass('active');
      $("#manageUserNav").addClass('active');
    });
    
    function clientStatus($status,$id)
    {
        $.ajax({
            url:"changeStatus",
            method:'GET',
            data:{'status':$status,'cliId':$id},
            success:function()
            {
                window.location.reload(true);
            }
        })
    }
  </script>
