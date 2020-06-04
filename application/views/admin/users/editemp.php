

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
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

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit User</h3>
            </div>
            <form role="form" action="<?php base_url('users/updateEmp') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label>Image Preview: </label><br>
                  <img src="<?php echo base_url() . $user_data['image'] ?>" width="150" height="150" class="img-circle">
                </div>

                <div class="form-group">
                  <label for="deluser_image">Update Image</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="deluser_image" name="deluser_image" type="file">
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="username">Full Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?php echo $user_data['name'] ?>" autocomplete="off">
                </div>

               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user_data['email'] ?>" autocomplete="off">
                </div>                

                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="contactno" name="contactno" placeholder="contactno" value="<?php echo $user_data['contactno'] ?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="vehicle_type">Vehicle Type</label>
                  <?php $v_type = $user_data['vehicle_type']; ?>
                  <select name="vehicle_type" id="vehicle_type" class='form-control'>
                      <option value="">Select Type</option>
                      <option <?php if ($v_type=== '1') { ?>selected="selected"<?php } ?> value="1">Bike</option>
                      <option <?php if ($v_type=== '2') { ?>selected="selected"<?php } ?> value="2">Scooter</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="phone">Vehicle No</label>
                  <input type="text" class="form-control" id="vehicleno" name="vehicleno" placeholder="vehicleno" value="<?php echo $user_data['vehicleno'] ?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="status">Status</label>
                  <?php $status = $user_data['status']; ?>
                  <select name="status" id="status" class='form-control'>
                      <option <?php if ($status=== '0') { ?>selected="selected"<?php } ?> value="0">Deactive</option>
                      <option <?php if ($status=== '1') { ?>selected="selected"<?php } ?> value="1">Active</option>
                  </select>
                </div>

                <div class="form-group">
                  <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Leave the password field empty if you don't want to change.
                  </div>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" id="password" name="password" placeholder="Password"  autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="cpassword">Confirm password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('users/delUsers') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
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
  $(".select_group").select2();
  // $("#description").wysihtml5();

  $("#mainempNav").addClass('active');
  $("#manageempNav").addClass('active');
  
  var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
      'onclick="alert(\'Call your custom code here.\')">' +
      '<i class="glyphicon glyphicon-tag"></i>' +
      '</button>'; 
  $("#deluser_image").fileinput({
      overwriteInitial: true,
      maxFileSize: 1500,
      showClose: false,
      showCaption: false,
      browseLabel: '',
      removeLabel: '',
      browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
      removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
      removeTitle: 'Cancel or reset changes',
      elErrorContainer: '#kv-avatar-errors-1',
      msgErrorClass: 'alert alert-block alert-danger',
      // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
      layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
      allowedFileExtensions: ["jpg", "png", "gif"]
  });
  // Add new input with associated 'remove' link when 'add' button is clicked.
});


</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#groups").select2();

    $("#mainUserNav").addClass('active');
    $("#manageUserNav").addClass('active');
  });
</script>
