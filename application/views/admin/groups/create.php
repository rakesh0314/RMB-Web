

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Groups</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">groups</li>
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
              <h3 class="box-title">Add Group</h3>
            </div>
            <form role="form" action="<?php base_url('groups/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="group_name">Group Name</label>
                  <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name">
                </div>
                <div class="form-group">
                  <label for="permission">Permission</label>

                  <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Create</th>
                        <th>Update</th>
                        <th>View</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Admin</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createAdmin" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateAdmin" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewAdmin" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteAdmin" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Clients</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Groups</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Employee</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createEmp" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateEmp" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewEmp" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteEmp" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Category</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createCategory" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCategory" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewCategory" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteCategory" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Stocks</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createStore" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateStore" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewStore" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteStore" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Units</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createUnit" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateUnit" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewUnit" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteUnit" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Products</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createProduct" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateProduct" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewProduct" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteProduct" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Orders</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateOrder" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewOrder" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteOrder" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>About</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createAbout" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateAbout" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewAbout" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteAbout" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Banner</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createBanner" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateBanner" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewBanner" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteBanner" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Terms & Cond.</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createTerms" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateTerms" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewTerms" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteTerms" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Transections</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewTxn" class="minimal"></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Reports</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewReports" class="minimal"></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Company</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCompany" class="minimal"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Profile</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile" class="minimal"></td>
                        <td> - </td>
                      </tr>
                      <tr><!-- 
                        <td>Setting</td>
                        <td>-</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting" class="minimal"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr> -->
                      <tr>
                        <td>Contact</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewContact" class="minimal"></td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteContact" class="minimal"></td>
                      </tr>
                    </tbody>
                  </table>
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('groups/') ?>" class="btn btn-warning">Back</a>
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
    $("#mainGroupNav").addClass('active');
    $("#addGroupNav").addClass('active');

    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });
  });
</script>

