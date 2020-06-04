

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Orders</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Orders</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class='toggle'>
  <div class='tabs'>
    <div class='tab active' onclick="fetch_data1()">New Orders</div>
    <div class='tab label-warning' onclick="fetch_data2()">Pandding Orders</div>
    <div class='tab label-success' onclick="fetch_data3()">Done Orders</div>
    <div class='tab label-danger' onclick="fetch_data4()">Cancel Orders</div>
  </div>


        <div id="messages" style="margin-top: 10px;"></div>

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
  <div class='panels' style="margin-top: 30px;">
    <div class='panel'>
      <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage New Orders</h3>
          </div>
      <div class="box-body">
        <div class="table-responsive">
            <table id="manageTable1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Bill no</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Date Time</th>
                <th>Total Products</th>
                <th>Total Amount</th>
                <th>Order status</th>
                <?php if(in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
                  <th>Action</th>
                <?php endif; ?>
              </tr>
              </thead>

            </table>
          </div>
          </div>
        </div>

    </div>
    <div class='panel'>

      <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Process Orders</h3>
          </div><div class="box-body">
      <div class="table-responsive">
            <table id="manageTable2" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Bill no</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Date Time</th>
                <th>Total Products</th>
                <th>Total Amount</th>
                <th>Order status</th>
                <?php if(in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
                  <th>Action</th>
                <?php endif; ?>
              </tr>
              </thead>

            </table>
          </div>
          </div>
        </div>
</div>
    <div class='panel'>
      <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Complete Orders</h3>
          </div>
      <div class="box-body">
      <div class="table-responsive">
            <table id="manageTable3" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Bill no</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Date Time</th>
                <th>Total Products</th>
                <th>Total Amount</th>
                <th>Order status</th>
                <?php if(in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
                  <th>Action</th>
                <?php endif; ?>
              </tr>
              </thead>

            </table>
          </div>
          </div>
        </div>
        </div>
    <div class='panel' >
      <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Cancel Orders</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
            <table id="manageTable4" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Bill no</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Date Time</th>
                <th>Total Products</th>
                <th>Total Amount</th>
                <th>Order status</th>
                <?php if(in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
                  <th>Action</th>
                <?php endif; ?>
              </tr>
              </thead>

            </table>
          </div>
          </div>
        </div>
  </div>
</div>


        
          <!-- /.box-header -->
                    <!-- /.box-body -->        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php if(in_array('deleteOrder', $user_permission)): ?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Order</h4>
      </div>

      <form role="form" action="<?php echo base_url('orders/remove') ?>" method="post" id="removeForm">
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



<script type="text/javascript">
var manageTable1;
var manageTable2;
var manageTable3;
var manageTable4;
var base_url = "<?php echo base_url(); ?>";

$(document).ready(function() {

  $("#mainOrdersNav").addClass('active');
  $("#manageOrdersNav").addClass('active');

 manageTable1 = $('#manageTable1').DataTable({
    'ajax': base_url + 'orders/fetchOrdersData/'+0,
    'order': []
  });

manageTable2 = $('#manageTable2').DataTable({
    'ajax': base_url + 'orders/fetchOrdersData/'+1,
    'order': []
  });

manageTable3 = $('#manageTable3').DataTable({
    'ajax': base_url + 'orders/fetchOrdersData/'+2,
    'order': []
  });

manageTable4 = $('#manageTable4').DataTable({
    'ajax': base_url + 'orders/fetchOrdersData/'+3,
    'order': []
  });

});

function fetch_data1() {
  // initialize the datatable 
  manageTable1.ajax.reload(null, false); 
}

function fetch_data2() {
  // initialize the datatable 
  manageTable2.ajax.reload(null, false); 
  
}

function fetch_data3() {
  // initialize the datatable 
  manageTable3.ajax.reload(null, false); 
}

function fetch_data4() {
  // initialize the datatable 
  manageTable4.ajax.reload(null, false); 
}

function reload() {
  manageTable1.ajax.reload(null, false); 
  manageTable2.ajax.reload(null, false); 
  manageTable3.ajax.reload(null, false); 
  manageTable4.ajax.reload(null, false); 
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
        data: { order_id:id }, 
        dataType: 'json',
        success:function(response) {

          reload();

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
var URLIs = "<?= base_url('orders/ORderSatus') ?>";
function OrderAceptFunc($id){
  // alert($id);
  
      $.ajax({
        url: URLIs,
        type: "GET",
        data: { order_id:$id }, 
        
        success:function(response) {
            if(response == 1){
              window.location.reload();
            }
          }
        });
}
//  For Tabs 
(function() {
  $(function() {
    var toggle;
    return toggle = new Toggle('.toggle');
  });

  this.Toggle = (function() {
    Toggle.prototype.el = null;

    Toggle.prototype.tabs = null;

    Toggle.prototype.panels = null;

    function Toggle(toggleClass) {
      this.el = $(toggleClass);
      this.tabs = this.el.find(".tab");
      this.panels = this.el.find(".panel");
      this.bind();
    }

    Toggle.prototype.show = function(index) {
      var activePanel, activeTab;
      this.tabs.removeClass('active');
      activeTab = this.tabs.get(index);
      $(activeTab).addClass('active');
      this.panels.hide();
      activePanel = this.panels.get(index);
      return $(activePanel).show();
    };

    Toggle.prototype.bind = function() {
      var _this = this;
      return this.tabs.unbind('click').bind('click', function(e) {
        return _this.show($(e.currentTarget).index());
      });
    };

    return Toggle;

  })();

}).call(this);

</script>
