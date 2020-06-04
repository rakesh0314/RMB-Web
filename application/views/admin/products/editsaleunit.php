

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Products Sale Units</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Products Sale Units</li>
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
          <form role="form" action="<?php echo base_url('products/productsaleunits') ?>" method="post">
        <div class="modal-body multi-field-equipment multi-equipments">
          <div class="form-group">
              <input type="hidden" class="form-control" id="p_id" name="p_id" value="<?= $product_data['id']; ?>">
              <label for="p_name">Product Name</label>
              <input type="text" class="form-control" id="p_name" value="<?= $product_data['name']; ?>"disabled>
            </div>
            <?php if(sizeof($saleunits)>0) : ?>
            <div class="form-group">
            <?php foreach($saleunits as $saleunit) : ?>
            <div class="row">
            <div class="col-md-2 col-xs-2 col-sm-2">
              <label for="units1">Select Unit</label>
              <select class="form-control" name="units[]">
                <?php foreach($units as $unit) : ?>
                  <option value="<?= $unit->id; ?>" <?php if((int) $unit->id === (int) $saleunit->unit_id){ echo 'selected';} ?> ><?= $unit->unit; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-2 col-xs-2 col-sm-2">
              <label for="quantity">Quantity</label>
              <input type="text" class="form-control" id="quantity" name="quantity[]" value="<?= $saleunit->quantity ?>">
            </div>
            <div class="col-md-3 col-xs-3 col-sm-3">
              <label for="sales_price">MRP Price</label>
              <input type="text" class="form-control" id="MRP_price" name="MRP_price[]" value="<?= $saleunit->mrpprice ?>" >
            </div>
            <div class="col-md-3 col-xs-3 col-sm-3">
              <label for="sales_price">Sales Price</label>
              <input type="text" class="form-control" id="sales_price" name="sales_price[]" value="<?= $saleunit->sellprice ?>">
            </div>
            <div class="col-md-2 col-xs-2 col-sm-2 remove-equipment">
              <button type="button" class="btn btn-danger" onclick="removeSaleUnit(<?= $saleunit->id; ?>)" style="position: absolute; top: 24px;">-</button>
            </div>
            </div>
            <?php endforeach; ?>
           </div>
            <?php endif; ?>
           <div class="form-group">
           <div class="multi-field-equipment multi-equipments" style="margin: 0">
           <div class="row multi-equipment">
           <div class="col-md-2 col-xs-2 col-sm-2">
             <label for="units1">Select Unit</label>
             <select class="form-control" name="units[]">
               <?php foreach($units as $unit) : ?>
                 <option value="<?= $unit->id; ?>" ><?= $unit->unit; ?></option>
               <?php endforeach; ?>
             </select>
           </div>
           <div class="col-md-2 col-xs-2 col-sm-2">
             <label for="quantity">Quantity</label>
             <input type="text" class="form-control" id="quantity" name="quantity[]" >
           </div>
           <div class="col-md-3 col-xs-3 col-sm-3">
             <label for="sales_price">MRP Price</label>
             <input type="text" class="form-control" id="MRP_price" name="MRP_price[]"  >
           </div>
           <div class="col-md-3 col-xs-3 col-sm-3">
             <label for="sales_price">Sales Price</label>
             <input type="text" class="form-control" id="sales_price" name="sales_price[]" >
           </div>
           <div class="col-md-2 col-xs-2 col-sm-2 remove-equipment">
             <button type="button" class="btn btn-danger" style="position: absolute; top: 24px;">-</button>
           </div>
           </div>
           </div>
           <button type="button" class="btn btn-success add-equipment" style="position: absolute;bottom: 30px;right: 20px;">+</button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
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


  var baseurl = '<?= base_url(); ?>';
  // remove functions 
function removeSaleUnit(id)
{
  event.preventDefault();
  if(id) {
      $.ajax({
        url: baseurl+"Products/deletesaleunit",
        type: "post",
        data: { id:id }, 
        dataType: 'json',
        success:function(response) {
          window.location.reload();
        }
      }); 
      return false;
  }
}





</script>

    
<script type="text/javascript">
  $('.multi-field-equipment').each(function() {
    var $wrapper = $('.multi-equipments', this);
    $(".add-equipment", $(this)).click(function(e) {
        $('.multi-equipment:first-child').clone(true).appendTo($wrapper).find('input,input,input').val('').focus();
        });
    $('.multi-equipment .remove-equipment').click(function() {
        if ($('.multi-equipment').length > 1)
            $(this).parent('.multi-equipment').remove();
    });
  });
</script>
