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
            <h3 class="box-title">Add Product</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('users/create') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">

                  <label for="product_image">Image</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image" type="file">
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="product_name">Product name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" autocomplete="off"/>
                </div>

                <div class="form-group">
                  <label for="sku">Product name (Hindi)</label>
                  <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter Product name Hindi" autocomplete="off" />
                </div>
                <div class="form-group">
                  <label for="Sarch_keys">Product Sarch key's</label>
                  <input type="text" class="form-control" id="sarchKey" name="sarchKey" placeholder="Enter Product Sarch key's" autocomplete="off" />
                </div>
                <div class="row">

                  <div class="col-md-6 col-xs-6 col-sm-6">
                <div class="form-group">
                  <label for="price">Selling Uinits</label>
                <select class="form-control " name="unit_id">
                    <?php foreach ($unit as $k => $v): ?>
                      <option value="<?php echo $v ->id ?>"><?php echo $v->unit ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                  </div>
                  <div class="col-md-3 col-xs-3 col-sm-3">
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" autocomplete="off" />
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
                  <textarea type="text" class="form-control" rows="5" id="description" name="description" placeholder="Enter description" autocomplete="off"></textarea>
                </div>

                <?php if($attributes): ?>
                  <?php foreach ($attributes as $k => $v): ?>
                    <div class="form-group">
                      <label for="groups"><?php echo $v['attribute_data']['name'] ?></label>
                      <select class="form-control select_group" id="attributes_value_id" name="attributes_value_id[]" multiple="multiple">
                        <?php foreach ($v['attribute_value'] as $k2 => $v2): ?>
                          <option value="<?php echo $v2['id'] ?>"><?php echo $v2['value'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>    
                  <?php endforeach ?>
                <?php endif; ?>

                <div class="form-group" >
                  <label for="category">Category</label>
                  <select class="form-control" id="category" name="category">
                    <?php foreach ($category as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Availability</label>
                  <select class="form-control" id="availability" name="availability">
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                  </select>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('products/') ?>" class="btn btn-warning">Back</a>
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

<script type="text/javascript">
  $(document).ready(function() {
    $(".select_group").select2();
    // $("#description").wysihtml5();

    $("#mainProductNav").addClass('active');
    $("#addProductNav").addClass('active');
    var btnCust = '';
    // var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
    //     'onclick="alert(\'Call your custom code here.\')">' +
    //     '<i class="glyphicon glyphicon-tag"></i>' +
    //     '</button>'; 
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
$('#ADDRow').click(function(e) {
    e.preventDefault();
    var i = 0;
    $("#PriceAndUnitId").append('<span id="'+'RemClaa'+i+'">'+ 
                '<div class="col-md-5 col-xs-5 col-sm-5 NewRowAddClass">'+
                '<div class="form-group">'+
                  '<label for="price">Selling Uinits</label>'+
                    '<select class="form-control " id="" name="uints[]">'+
                      '<?php foreach ($unit as $k => $v): ?>'+
                        '<option value="<?php echo $v ->id ?>"><?php echo $v->unit ?></option>'+
                       '<?php endforeach ?>'+
                    '</select>'+
                  '</div>'+
                  '</div>'+
                  '<div class="col-md-3 col-xs-3 col-sm-3">'+
                    '<div class="form-group">'+
                      '<label for="price">Product MRP</label>'+
                        '<input type="text" class="form-control" id="mrpprice" name="mrpprice[]" placeholder="Enter price" autocomplete="off" />'+
                    '</div>'+
                   '</div>'+
                  '<div class="col-md-3 col-xs-3 col-sm-3">'+
                   '<div class="form-group">'+
                    '<label for="price">Product Sell Price</label>'+
                      '<input type="text" class="form-control" id="sellprice" name="sellprice[]" placeholder="Enter price" autocomplete="off" />'+
                    '</div>'+
                    '</div>'+
                      '<div class="col-md-1 col-xs-1 col-sm-1">'+
                        '<div class="form-group">'+
                          '<label for="price"></label>'+
                          '<button type="button" class="btn btn-primary btn-xs form-control " onclick="RemoveRow('+i+')"><i class="fa fa-minus" aria-hidden="true"></i></button>'+
                      '</div>'+
                  '</div>'
        );
    i++;
});

  });

    function RemoveRow(i){
    $('#RemClaa'+i).remove();

  }


</script>
<!-- <script type="text/javascript" src="<?= base_url('assets/plugins/page.js')  ?>"></script> -->