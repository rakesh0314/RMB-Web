

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
            <div class="row">
              <div class="col-md-6 form-group">
              <label class="box-title control-label">Order No: <?php print_r($order_data['order']['id']) ?></label>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="date" class="col-sm-12 control-label">Order Date: <?php print_r($order_data['order']['date_time']) ?></label>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3">
                  <label class="control-label">Customer Name: &nbsp;<?php echo $order_data['user']->clt_email ?></label>
                </div>  
                <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3">
                  <label class="control-label">Customer Phone: &nbsp;<?php echo $order_data['user']->clt_conno ?></label>
                </div> 

                  <?php if($order_data['order']['delboy']==""){
                  if(isset($del_boy)){?>
                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-3 control-label" style="text-align:left;">Assign Delivery Boy : </label>
                    <div class="col-sm-3">
                      <select class="form-control" id="delboy" name="delboy" >
                          <option value="">Select Delivery Boy</option>
                          <?php foreach($del_boy as $boy){?>
                          <option <?php if($order_data['order']['delboy']==$boy->id){echo"selected";}?> value="<?= $boy->id?>"><?= $boy->name?></option>
                          <?php } ?>
                      </select>
                    </div>
                  </div><?php } }else{ ?>
                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-6 control-label" style="text-align:left;">Delivery Boy : &nbsp;<?php echo $del_boy['name'] ?></label>
                  </div><?php } ?>
                <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3">
                  <label class="control-label">Customer Address:</label>
                </div> 

                <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3">
                  <label  class="control-label">Category: &nbsp; <?= $adderss_data->category; ?><br /><?php if($adderss_data->category=='Home'){ ?>House No.: &nbsp; <?= $adderss_data->house_no; }?><br />Street : <?= $adderss_data->street_no; ?><br /> Land-Mark :&nbsp;<?= $adderss_data->landmark; ?><br /> City : &nbsp;<?= $adderss_data->city; ?> </label>
                  
                </div> 
               </div>
            </div>     
          </div>
          <form role="form" action="<?= base_url('orders/update/'.$order_data['order']['id']) ?>" method="post" class="form-horizontal">
              <div class="box-body">
                <table class="table table-bordered" id="product_info_table">
                  <thead>
                    <tr>
                      <th style="width:30%">Product</th>
                      <th style="width:20%">Unit</th>
                      <th style="width:20%">Qty</th>
                      <th style="width:20%">Rate</th>
                      <th style="width:10%">Amount</th>
                      
                    </tr>
                  </thead>

                   <tbody>

                    <?php if(isset($order_data['order_item'])): ?>
                      <?php $x = 1; ?>
                      <?php foreach ($order_data['order_item'] as $key => $val): ?>
                        <?php //print_r($v); ?>
                       <tr id="row_<?php echo $x; ?>">
                         <td>
                          
                          <select class="form-control select_group product" data-row-id="row_<?php echo $x; ?>" id="product_<?php echo $x; ?>" name="product[]" style="width:100%;" onchange="getProductData(<?php echo $x; ?>)" disabled>
                             
                              <?php foreach ($products as $k => $v): ?>
                                <option value="<?php echo $v['id'] ?>" <?php if($val['product_id'] == $v['id']) { echo "selected='selected'"; } ?>>
                                  <?php echo $v['name'] ?>
                                    
                                  </option>
                              <?php endforeach ?>
                            </select>
                          </td>
                          <td>
                            <input type="text" name="unit_id[]" id="unit_id<?php echo $x; ?>" class="form-control" required value="<?php echo $val['unit'] ?>" autocomplete="off" disabled>
                          </td>
                          <td>
                            <input type="text" name="qty[]" id="qty_<?php echo $x; ?>" class="form-control" required onkeyup="getTotal(<?php echo $x; ?>)" value="<?php echo $val['qty'] ?>" autocomplete="off" disabled>
                          </td>
                          <td>
                            <input type="text" name="rate[]" id="rate_<?php echo $x; ?>" class="form-control" disabled value="<?php echo $val['rate'] ?>" autocomplete="off">
                            <input type="hidden" name="rate_value[]" id="rate_value_<?php echo $x; ?>" class="form-control" value="<?php echo $val['rate'] ?>" autocomplete="off">
                          </td>
                          <td>
                            <input type="text" name="amount[]" id="amount_<?php echo $x; ?>" class="form-control" disabled value="<?php echo $val['amount'] ?>" autocomplete="off">
                            <input type="hidden" name="amount_value[]" id="amount_value_<?php echo $x; ?>" class="form-control" value="<?php echo $val['amount'] ?>" autocomplete="off">
                          </td>
                          
                       </tr>
                       <?php $x++; ?>
                     <?php endforeach; ?>
                   <?php endif; ?>
                   </tbody>
                </table>

                <br /> <br/>

                <div class="col-md-12 col-xs-12 pull pull-right">
                  <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                  <div class="form-group">
                    <label for="gross_amount" class=" control-label">Gross Amount :</label><br />
                    <div class="">
                      <input type="text" class="form-control" id="gross_amount" name="gross_amount" disabled value="<?php echo $order_data['order']['gross_amount'] ?>" autocomplete="off">
                      <input type="hidden" class="form-control" id="gross_amount_value" name="gross_amount_value" value="<?php echo $order_data['order']['gross_amount'] ?>" autocomplete="off">
                    </div>
                  </div>
                  </div>
                  <?php if($is_service_enabled == true): ?>
                  <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">

                  <div class="form-group">
                    <label for="service_charge" class=" control-label">S-Charge :<?php echo $company_data['service_charge_value'] ?> %</label><br />
                    <div class="">
                      <input type="text" class="form-control" id="service_charge" name="service_charge" disabled value="<?php echo $order_data['order']['service_charge'] ?>" autocomplete="off">
                      <input type="hidden" class="form-control" id="service_charge_value" name="service_charge_value" value="<?php echo $order_data['order']['service_charge'] ?>" autocomplete="off">
                    </div>
                  </div>
                </div>
                  <?php endif; ?>
                  
                  <!-- <div class="form-group" style="display: none;">
                    <label for="discount" class=" control-label">Discount</label>
                    <div class="">
                      <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount" onkeyup="subAmount()" value="<?php echo $order_data['order']['discount'] ?>" autocomplete="off">
                    </div>
                  </div> -->
                  <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">

                  <div class="form-group">
                    <label for="net_amount" class=" control-label">Net Amount :</label> <br />
                    <div class="">
                      <input type="text" class="form-control" id="net_amount" name="net_amount" disabled value="<?php echo $order_data['order']['net_amount'] ?>" autocomplete="off">
                      <input type="hidden" class="form-control" id="net_amount_value" name="net_amount_value" value="<?php echo $order_data['order']['net_amount'] ?>" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">

                  <div class="form-group">
                    <label for="payment_method" class=" control-label">Payment Mode : </label> <br />
                    <div class="">
                      <input type="text" class="form-control" id="net_amount" name="net_amount" disabled value="<?php echo $order_data['order']['payment_method'] ?>" autocomplete="off">
                      <input type="hidden" class="form-control" id="payment_method" name="payment_method" value="<?php echo $order_data['order']['payment_method'] ?>" autocomplete="off">
                    </div>
                  </div>
                </div>
                  <!-- <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">

                  <div class="form-group">
                    <label for="paid_status" class=" control-label">Order Status :</label><br />
                    <div class="">
                      <select type="text" class="form-control" id="paid_status" name="paid_status">
                        <option <?php if($order_data['order']['paid_status']=='1'){echo "selected";}?> value="1">Paid</option>
                        <option <?php if($order_data['order']['paid_status']=='0'){echo "selected";}?> value="0">Unpaid</option>
                      </select>
                    </div>
                  </div>
                </div> -->
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">

                <input type="hidden" name="service_charge_rate" value="<?php echo $company_data['service_charge_value'] ?>" autocomplete="off">
                <input type="hidden" name="vat_charge_rate" value="<?php echo $company_data['vat_charge_value'] ?>" autocomplete="off">

                <?php if($order_data['order']['delboy']==""){?>
                  <input type="hidden" name="orderId" id="orderId" value="<?= $order_data['order']['id']?>">
                  <button type="button" id="assigndel" class="btn btn-primary">Save Changes</button><?php }else{?>
                <button type="submit" class="btn btn-primary">Save Changes</button><?php
                }?>
                <a href="<?php echo base_url('orders/') ?>" class="btn btn-warning">Back</a>
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
  var base_url = "<?php echo base_url(); ?>";

  // function printOrder(id)
  // {
  //   if(id) {
  //     $.ajax({
  //       url: base_url + 'orders/printDiv/' + id,
  //       type: 'post',
  //       success:function(response) {
  //         var mywindow = window.open('', 'new div', 'height=400,width=600');
  //         // mywindow.document.write('<html><head><title></title>');
  //         // mywindow.document.write('<link rel="stylesheet" href="<?php //echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>" type="text/css" />');
  //         // mywindow.document.write('</head><body >');
  //         mywindow.document.write(response);
  //         // mywindow.document.write('</body></html>');

  //         mywindow.print();
  //         mywindow.close();

  //         return true;
  //       }
  //     });
  //   }
  // }

  $(document).ready(function() {
    $(".select_group").select2();
    // $("#description").wysihtml5();

    $("#mainOrdersNav").addClass('active');
    $("#manageOrdersNav").addClass('active');
    
    
    // Add new row in the table 
    $("#add_row").unbind('click').bind('click', function() {
      var table = $("#product_info_table");
      var count_table_tbody_tr = $("#product_info_table tbody tr").length;
      var row_id = count_table_tbody_tr + 1;

      $.ajax({
          url: base_url + '/orders/getTableProductRow/',
          type: 'post',
          dataType: 'json',
          success:function(response) {
            

              // console.log(reponse.x);
               var html = '<tr id="row_'+row_id+'">'+
                   '<td>'+ 
                    '<select class="form-control select_group product" data-row-id="'+row_id+'" id="product_'+row_id+'" name="product[]" style="width:100%;" onchange="getProductData('+row_id+')">'+
                        '<option value=""></option>';
                        $.each(response, function(index, value) {
                          html += '<option value="'+value.id+'">'+value.name+'</option>';             
                        });
                        
                      html += '</select>'+
                    '</td>'+ 
                    '<td><input type="number" name="qty[]" id="qty_'+row_id+'" class="form-control" onkeyup="getTotal('+row_id+')"></td>'+
                    '<td><input type="text" name="rate[]" id="rate_'+row_id+'" class="form-control" disabled><input type="hidden" name="rate_value[]" id="rate_value_'+row_id+'" class="form-control"></td>'+
                    '<td><input type="text" name="amount[]" id="amount_'+row_id+'" class="form-control" disabled><input type="hidden" name="amount_value[]" id="amount_value_'+row_id+'" class="form-control"></td>'+
                    '<td><button type="button" class="btn btn-default" onclick="removeRow(\''+row_id+'\')"><i class="fa fa-close"></i></button></td>'+
                    '</tr>';

                if(count_table_tbody_tr >= 1) {
                $("#product_info_table tbody tr:last").after(html);  
              }
              else {
                $("#product_info_table tbody").html(html);
              }

              $(".product").select2();

          }
        });

      return false;
    });

  }); // /document

  function getTotal(row = null) {
    if(row) {
      var total = Number($("#rate_value_"+row).val()) * Number($("#qty_"+row).val());
      total = total.toFixed(2);
      $("#amount_"+row).val(total);
      $("#amount_value_"+row).val(total);
      
      subAmount();

    } else {
      alert('no row !! please refresh the page');
    }
  }

  // get the product information from the server
  function getProductData(row_id)
  {
    var product_id = $("#product_"+row_id).val();    
    if(product_id == "") {
      $("#rate_"+row_id).val("");
      $("#rate_value_"+row_id).val("");

      $("#qty_"+row_id).val("");           

      $("#amount_"+row_id).val("");
      $("#amount_value_"+row_id).val("");

    } else {
      $.ajax({
        url: base_url + 'orders/getProductValueById',
        type: 'post',
        data: {product_id : product_id},
        dataType: 'json',
        success:function(response) {
          // setting the rate value into the rate input field
          
          $("#rate_"+row_id).val(response.price);
          $("#rate_value_"+row_id).val(response.price);

          $("#qty_"+row_id).val(1);
          $("#qty_value_"+row_id).val(1);

          var total = Number(response.price) * 1;
          total = total.toFixed(2);
          $("#amount_"+row_id).val(total);
          $("#amount_value_"+row_id).val(total);
          
          subAmount();
        } // /success
      }); // /ajax function to fetch the product data 
    }
  }

  // calculate the total amount of the order
  function subAmount() {
    var service_charge = <?php echo ($company_data['service_charge_value'] > 0) ? $company_data['service_charge_value']:0; ?>;
    var vat_charge = <?php echo ($company_data['vat_charge_value'] > 0) ? $company_data['vat_charge_value']:0; ?>;

    var tableProductLength = $("#product_info_table tbody tr").length;
    var totalSubAmount = 0;
    for(x = 0; x < tableProductLength; x++) {
      var tr = $("#product_info_table tbody tr")[x];
      var count = $(tr).attr('id');
      count = count.substring(4);

      totalSubAmount = Number(totalSubAmount) + Number($("#amount_"+count).val());
    } // /for

    totalSubAmount = totalSubAmount.toFixed(2);

    // sub total
    $("#gross_amount").val(totalSubAmount);
    $("#gross_amount_value").val(totalSubAmount);

    // vat
    var vat = (Number($("#gross_amount").val())/100) * vat_charge;
    vat = vat.toFixed(2);
    $("#vat_charge").val(vat);
    $("#vat_charge_value").val(vat);

    // service
    var service = (Number($("#gross_amount").val())/100) * service_charge;
    service = service.toFixed(2);
    $("#service_charge").val(service);
    $("#service_charge_value").val(service);
    
    // total amount
    var totalAmount = (Number(totalSubAmount) + Number(vat) + Number(service));
    totalAmount = totalAmount.toFixed(2);
    // $("#net_amount").val(totalAmount);
    // $("#totalAmountValue").val(totalAmount);

    var discount = $("#discount").val();
    if(discount) {
      var grandTotal = Number(totalAmount) - Number(discount);
      grandTotal = grandTotal.toFixed(2);
      $("#net_amount").val(grandTotal);
      $("#net_amount_value").val(grandTotal);
    } else {
      $("#net_amount").val(totalAmount);
      $("#net_amount_value").val(totalAmount);
      
    } // /else discount 

    var paid_amount = Number($("#paid_amount").val());
    if(paid_amount) {
      var net_amount_value = Number($("#net_amount_value").val());
      var remaning = net_amount_value - paid_amount;
      $("#remaining").val(remaning.toFixed(2));
      $("#remaining_value").val(remaning.toFixed(2));
    }

  } // /sub total amount

  function paidAmount() {
    var grandTotal = $("#net_amount_value").val();

    if(grandTotal) {
      var dueAmount = Number($("#net_amount_value").val()) - Number($("#paid_amount").val());
      dueAmount = dueAmount.toFixed(2);
      $("#remaining").val(dueAmount);
      $("#remaining_value").val(dueAmount);
    } // /if
  } // /paid amoutn function

  function removeRow(tr_id)
  {
    $("#product_info_table tbody tr#row_"+tr_id).remove();
    subAmount();
  }

  $('#assigndel').on('click',function()
  {
    var id = $('#orderId').val();
    var del = $('#delboy').val();
    var base_url = "<?= base_url()?>";
    $.ajax({
      url:base_url+"orders/assign_delboy/"+id,
      type:"GET",
      data:"delboy="+del,
      success:function(response)
      {
        if (response==1) 
        {
          window.location.replace(base_url+"orders");
        }else{
          $('#message').html('<div class="alert alert-error alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+'Some error on update'+
          '</div>')
        }
      }
    })
  })
</script>