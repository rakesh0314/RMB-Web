<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Shri Ram</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Shri Ram</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
    <ul class="nav navbar-nav navbar-right"  style="margin-right: 0px;">
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="badge badge-pill badge-primary"><?php if((int) $order_notification_count > 0){ echo $order_notification_count; } ?></span><i class="fa fa-bell" aria-hidden="true"></i>
          <span class="caret"></span></a>
          <ul class="dropdown-menu " style="width:250px;">
            <?php 
              foreach($order_topten_notifications as $order_topten_notification){
                $order_id = $order_topten_notification['id'];
                ?>
                <li><a onClick="notification_readed(<?= $order_id ?>)" ><?= $order_topten_notification['bill_no']; ?><span class="badge badge-success " style="float: right;"><?= date('d-m-Y', strtotime($order_topten_notification['date_time'])); ?></span></a></li>
                <?php
              }
            ?>
            <!-- base_url("orders/update/$order_id"); -->
              <li><a onClick="all_notification_readed()"> View All</a></li>
          </ul>
        </li>
        <li></li>
      </ul>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
<script type="text/javascript">

var baseurl = '<?= base_url(); ?>';

function notification_readed(id) {
  event.preventDefault();
        $.ajax({
                url:baseurl+"Orders/readed_order",
                type:"POST",
                data: {"order_id" : id},
                success: function(response)
                {
                  window.location.replace(baseurl+"Orders/update/"+id);
                }
        });
}

function all_notification_readed() {
  event.preventDefault();
        $.ajax({
                url:baseurl+"Orders/readed_orders",
                type:"POST",
                success: function(response)
                {
                  window.location.replace(baseurl+"orders");
                }
        });
}
   
   </script>