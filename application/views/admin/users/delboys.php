

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Employees</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Employees</li>
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
          
          <?php if(in_array('createEmp', $user_permission)): ?>
            <a href="<?php echo base_url('users/createEmp') ?>" class="btn btn-primary">Add Employees</a>
            <br /> <br />
          <?php endif; ?>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Employees</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="empTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Vehicle Type</th>
                  <th>Vehicle No</th>

                  <?php if(in_array('updateEmp', $user_permission) || in_array('deleteEmp', $user_permission)): ?>
                  <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($delboy): ?>                  
                    <?php foreach ($delboy as $k => $v):?>
                    
                      <tr>
                        <td><img src="<?= base_url($v['image'])?>" alt="<?= $v['name']?>" class="img-circle" width="50" height="50" /></td>
                        <td><?php echo $v['name']; ?></td>
                        <td><?php echo $v['email']; ?></td>
                        <td><?php echo $v['contactno']; ?></td>
                        <td><?php if($v['vehicle_type']=='1'){echo "BIKE";}else{echo "Scooter";} ?></td>
                        <td><?php echo $v['vehicleno']; ?></td>
                        <td><?php if($v['status']=='1'){echo "<span class='btn btn-success'>Active</span>";}else{echo "<span class='btn btn-danger'>Diactive</span>";} ?></td>

                        <?php if(in_array('updateEmp', $user_permission) || in_array('deleteEmp', $user_permission)): ?>

                        <td>
                          <?php if(in_array('updateEmp', $user_permission)): ?>
                            <a href="<?php echo base_url('users/editemp/'.$v['id']) ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                          <?php endif; ?>
                          <?php if(in_array('deleteEmp', $user_permission)): ?>
                            <a href="<?php echo base_url('users/deleteemp/'.$v['id']) ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                      </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                </tbody>
              </table>
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

      // $('#empTable').DataTable();
      $("#mainempNav").addClass('active');
      $("#manageempNav").addClass('active');
    
    
  
  });
  </script>
