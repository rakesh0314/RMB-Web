<!-- Content Wrapper. Contains page content -->
<script>
var number uid;
</script>
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

        <?php if(in_array('createProduct', $user_permission)): ?>
          <a href="<?php echo base_url('products/create') ?>" class="btn btn-primary">Add Product</a>
          <br /> <br />
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Products</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Image</th>
                <!-- <th>SKU</th> -->
                <th>Product Name</th>
                <!-- <th>Price</th> -->
                <th>Qty</th>
                <th>Store</th>
                <th>Availability</th>
                <?php if(in_array('updateProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
                  <th>Action</th>
                <?php endif; ?>
              </tr>
              </thead>

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

<?php if(in_array('deleteProduct', $user_permission)): ?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Product</h4>
      </div>

      <form role="form" action="<?php echo base_url('products/remove') ?>" method="post" id="removeForm">
        <div class="modal-body">
          <p>Do you really want to remove?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<?php if(in_array('updateProduct', $user_permission)): ?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="stockModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" onClick="refreshPage()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Product Stock</h4>
      </div>

      <form role="form" action="<?php echo base_url('products/addstock') ?>" method="post" id="stockForm">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" disabled>
          </div>
          
          <div class="form-group">
          <div class="row" id="UnitPriceAndQuantity">
            <div class="col-md-4 col-xs-4 col-sm-4">
              <label for="unit_select">Select Unit</label>
              <select class="form-control" id="units" name="units">
              </select>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
              <label for="quantity">Quantity</label>
              <input type="text" class="form-control" id="quantity" name="quantity">
            </div>
          <div class="col-md-4 col-xs-4 col-sm-4">
            <label for="purchase_price">Purchase Price</label>
            <input type="text" class="form-control" id="purchase_price" name="purchase_price">
          </div>
          </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" onClick="refreshPage()" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<script type="text/javascript">
var manageTable;
var base_url = "<?php echo base_url(); ?>";

$(document).ready(function() {

  $("#mainProductNav").addClass('active');
  $("#manageProductNav").addClass('active');

  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': base_url + 'products/fetchProductData',
    'order': []
  });

});

function refreshPage(){
    window.location.reload();
}

// remove functions 
function removeFunc(id)
{
  if(id) {
    $("#removeForm").on('submit', function() {

      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: { product_id:id }, 
        dataType: 'json',
        success:function(response) {

          manageTable.ajax.reload(null, false); 

          if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $("#removeModal").modal('hide');

          } else {

            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>'); 
          }
        }
      }); 

      return false;
    });
  }
}

</script>
<script type="text/javascript">

var baseurl = '<?= base_url(); ?>';

function stockFunc(id) {
  event.preventDefault();
        $.ajax({
                url:baseurl+"Products/product_detail_by_id",
                type:"GET",
                data: {"product_id" : id},
                dataType:"json",
                success: function(response)
                {
                    $('#id').val(response.prod.id);
                    $('#name').val(response.prod.name);
                    var unitID = response.prod.unit_id;
                    if(unitID == '1' || unitID == '2'){
                        for (x of response.units) {
                          if(x.id == '1'){
                            var sel = document.getElementById("units");
                            var option = document.createElement("option");
                            option.text = x.unit.toUpperCase();
                            option.value = x.id;
                            sel.add(option, x.id);
                          }else if(x.id == '2'){
                            var sel = document.getElementById("units");
                            var option = document.createElement("option");
                            option.text = x.unit.toUpperCase();
                            option.value = x.id;
                            sel.add(option, x.id);
                          }
                          
                        }
                    }else if(unitID == '3' || unitID == '4'){
                      for (x of response.units) {
                          if(x.id == '3'){
                            var sel = document.getElementById("units");
                            var option = document.createElement("option");
                            option.text = x.unit.toUpperCase();
                            option.value = x.id;
                            sel.add(option, x.id);
                          }else if(x.id == '4'){
                            var sel = document.getElementById("units");
                            var option = document.createElement("option");
                            option.text = x.unit.toUpperCase();
                            option.value = x.id;
                            sel.add(option, x.id);
                          }
                          
                        }
                    }else if(unitID == '5' || unitID == '6'){
                      for (x of response.units) {
                          if(x.id == '5'){
                            var sel = document.getElementById("units");
                            var option = document.createElement("option");
                            option.text = x.unit.toUpperCase();
                            option.value = x.id;
                            sel.add(option, x.id);
                          }else if(x.id == '6'){
                            var sel = document.getElementById("units");
                            var option = document.createElement("option");
                            option.text = x.unit.toUpperCase();
                            option.value = x.id;
                            sel.add(option, x.id);
                          }
                          
                        }
                    }
                }
        });
}
</script>