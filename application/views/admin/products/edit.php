    

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Products</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Products</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" id="successmsg" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" id="errormsg" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>


        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Edit Product</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('users/update') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label>Image Preview: </label><br>
                  <img src="<?php echo base_url() . $product_data['image'] ?>" width="150" height="150" class="img-circle">
                </div>

                <div class="form-group">
                  <label for="product_image">Update Image</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image" type="file">
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="product_name">Product name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" value="<?php echo $product_data['name']; ?>"  autocomplete="off"/>
                </div>

                <div class="form-group">
                  <label for="sku">Product Name (Hindi)</label>
                  <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter sku" value="<?php echo $product_data['sku']; ?>" autocomplete="off" />
                </div>
                <div class="form-group">
                  <label for="Sarch_keys">Product Sarch key's</label>
                  <input type="text" class="form-control" id="sarchKey" name="sarchKey" placeholder="Enter Product Sarch key's" value="<?php echo $product_data['sarch_key']; ?>" autocomplete="off" />
                </div>
                <div class="row">

                  <div class="col-md-6 col-xs-6 col-sm-6">
                <div class="form-group">
                  <label for="price">Selling Uinits</label>
                <select class="form-control " name="unit_id">
                    <?php foreach ($unit as $k => $v): ?>
                      <option value="<?php echo $v ->id ?>" <?php  if($product_data['unit_id'] == $v ->id){ echo 'selected'; } ?> ><?php echo $v->unit ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                  </div>
                  <div class="col-md-3 col-xs-3 col-sm-3">
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="text" class="form-control" id="quantity" name="quantity" placeholder="<?php echo $product_data['qty'] ?>" autocomplete="off" />
                </div>
                 </div>
                  <div class="col-md-3 col-xs-3 col-sm-3">
                <div class="form-group">
                  <label for="price">Product Purchase Price</label>
                  <input type="text" class="form-control" id="purchase_price" name="purchase_price" placeholder="Enter Purchase Price" autocomplete="off" />
                </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea type="text" class="form-control" id="description" rows="5" name="description" placeholder="Enter 
                  description" autocomplete="off"><?php echo $product_data['description']; ?></textarea>
                </div>

                

                <div class="form-group">
                  <label for="category">Category</label>
                  <?php $category_data = json_decode($product_data['category_id']); ?>
                  <select class="form-control" id="category" name="category">
                    <?php foreach ($category as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>" <?php if($v['id']== $category_data) { echo 'selected="selected"'; }else{echo"disabled";} ?>><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Availability</label>
                  <select class="form-control" id="availability" name="availability">
                    <option value="1" <?php if($product_data['availability'] == 1) { echo "selected='selected'"; } ?>>Yes</option>
                    <option value="2" <?php if($product_data['availability'] != 1) { echo "selected='selected'"; } ?>>No</option>
                  </select>
                </div>



              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('users/') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
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

<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Unit</h4>
      </div>

      <form role="form" method="post">
        <div class="modal-body">
          <p>Do you really want to remove?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="removeForm" type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

  
  $(document).ready(function() {
    $(".select_group").select2();
    // $("#description").wysihtml5();

    $("#mainProductNav").addClass('active');
    $("#manageProductNav").addClass('active');
    
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 
    $("#product_image").fileinput({
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
    $('#ADDRow').click(function(e) {
    e.preventDefault();
    var i = 0;
    $("#PriceAndUnitId").append('<span id="'+'RemClaa'+i+'">'+ 
                '<div class="col-md-4 col-xs-4 col-sm-4 NewRowAddClass">'+
                '<div class="form-group">'+
                  '<label for="price">Selling Uinits</label>'+
                    '<select class="form-control " name="uints[]">'+
                      '<?php foreach ($unit as $k => $v): ?>'+
                        '<option value="<?php echo $v ->id ?>"><?php echo $v->unit ?></option>'+
                       '<?php endforeach ?>'+
                    '</select>'+
                  '</div>'+
                  '</div>'+
                  '<div class="col-md-3 col-xs-3 col-sm-3">'+
                    '<div class="form-group">'+
                      '<label for="price">Product MRP</label>'+
                        '<input type="text" class="form-control" name="mrpprice[]" placeholder="Enter price" autocomplete="off" />'+
                    '</div>'+
                   '</div>'+
                  '<div class="col-md-3 col-xs-3 col-sm-3">'+
                   '<div class="form-group">'+
                    '<label for="price">Product Sell Price</label>'+
                      '<input type="text" class="form-control" name="sellprice[]" placeholder="Enter price" autocomplete="off" />'+
                    '</div>'+
                    '</div>'+
                      '<div class="col-md-1 col-xs-1 col-sm-1">'+
                        '<div class="form-group">'+
                          '<label for="price">&nbsp;</label>'+
                          '<button type="button" class="btn btn-primary btn-xs form-control " onclick="RemoveRow('+i+')"><i class="fa fa-minus" aria-hidden="true"></i></button>'+
                      '</div>'+
                  '</div>'
        );
    i++;
});

  
   function RemoveRow(i){
    $('#RemClaa'+i).remove();

  }
  
  function removeFunc(id)
  {
      var count = $('#unitcount').val();
      if(count>1)
      {
          if(id)
          {
              $('#removeModal').modal('toggle');
              $('#removeForm').on('click',function(){
                  $.ajax({
                      url:"<?= base_url()?>products/deleteUnit",
                      type:"GET",
                      data:"id="+id,
                      dataType:"json",
                      success:function(response)
                      {
                          if(response.status==true)
                          {
                              $('#removeModal').modal('hide');
                              $('#messages').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+response.massage+'</div>');
                              setTimeout(function()
                              {
                                location.reload(true);
                              },1000);
                          }else{
                              $('#errormsg').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+response.massage+'</div>');
                          }
                      }
                  })
              })
          }
      }else{
          $('#messages').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Add some units to delete this</div>');
      }
  }
</script>