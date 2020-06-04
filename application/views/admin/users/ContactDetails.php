

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Users Contact</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Contacts</li>
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
              <h3 class="box-title">Manage Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Massage</th>
                  <th>Date</th>

                  <?php if(in_array('updateContact', $user_permission) || in_array('deleteContact', $user_permission)): ?>
                  <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($contact): ?>                  
                    <?php $i=1; foreach ($contact as $k => $v): ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v['name']; ?></td>
                        <td><?php echo $v['email']; ?></td>
                        <td><?php echo $v['massage']; ?></td>
                        <td><?= $v['date']?></td>

                        <?php if(in_array('updateContact', $user_permission) || in_array('deleteContact', $user_permission)): ?>

                        <td>
                          <?php if(in_array('updateContact', $user_permission)): ?>
                            <!--<a href="<?php echo base_url('users/editUser/'.$v['id']) ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>-->
                          <?php endif; ?>
                          <?php if(in_array('deleteContact', $user_permission)): ?>
                            <a href="<?php echo base_url('users/deleteContact/'.$v['id']) ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                      </tr>
                    <?php $i++; endforeach ?>
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
      $('#userTable').DataTable();

      $("#mainContactNav").addClass('active');
    });
  </script>
