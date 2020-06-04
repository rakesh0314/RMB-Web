

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Terms & COnditions</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Terms & COnditions</li>
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
        <?php if(in_array('createTerms', $user_permission)): ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Terms & Conditions</button>
          <br /> <br />
        <?php endif;?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Terms & COnditions</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTabledata" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>S No.</th>
                <!--<th>Image</th>-->
                <th>Title</th>
                <th style="width:50%">Content</th>
                <th>Status</th>
                <th>Date</th>
                <?php if(in_array('updateTerms', $user_permission) || in_array('deleteTerms', $user_permission)): ?>
                <th>Action</th>
              <?php endif;?>
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

<?php if(in_array('createTerms', $user_permission)): ?>
<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Terms</h4>
      </div>

      <form role="form" enctype="multipart/form-data" method="POST" id="createForm">

        <div class="modal-body">
            <!--<div class="form-group">-->

            <!--  <label for="About_image">Banner Image</label>-->
            <!--  <div class="kv-avatar">-->
            <!--      <div class="file-loading">-->
            <!--          <input id="About_image" name="About_image" type="file">-->
            <!--      </div>-->
            <!--  </div>-->
            <!--</div>-->
          <div class="form-group">
            <label for="header">Headers</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" autocomplete="off">
          </div>
          <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group" >
            <label for="header">Subject</label>
            <input type="text" class="form-control" id="subject" name="termsubject[]" placeholder="Enter Header" required autocomplete="off">
          </div>  </div>   
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="termcontent[]" class="form-control" rows="3" required></textarea>
          </div></div>
          </div>
          <div class="row" id="AddExtra">
 
          </div>
           <div class="row">
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <button type="button" class="btn btn-success form-control" id="addrow" >Add Row</button>
          </div>
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <button type="button" class="btn btn-danger form-control" style="display: none;" id="delrow" >Delete Row</button>
          </div>
        </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif;?>




<?php if(in_array('deleteTerms', $user_permission)): ?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Stock</h4>
      </div>

      <form role="form" action="<?php echo base_url('stores/remove') ?>" method="post" id="removeForm">
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
var manageTabledata;
var addrow = 0;
$(document).ready(function() {

   $("#termsNav").addClass('active');
//   $('#content').wysihtml5();
   
    var btnCust = '';
   

  // initialize the datatable 
  manageTabledata = $('#manageTabledata').DataTable({
    'ajax': 'fetchtermsData',
    'order': []
  });

$("#About_image").fileinput({
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
  // submit the create from 
  $("#createForm").unbind('submit').on('submit', function() {
    var form = $(this);

    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: "<?= base_url()?>company/createterms",
      type: "POST",
      data: new FormData(this), // /converting the form data into array and sending it to server
      contentType:false,
      processData:false,
      cache:false,
      dataType: 'json',
      success:function(response) {

        manageTabledata.ajax.reload(null, false); 

        if(response.success === true) {
          $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.massage+
          '</div>');


          // hide the modal
          $("#addModal").modal('hide');

          // reset the form
          $("#createForm")[0].reset();
          $("#createForm .form-group").removeClass('has-error').removeClass('has-success');

        } else {
            
          $("#addModal").modal('hide');
            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.massage+
            '</div>');
          }
        
      }
    }); 

    return false;
  });

});

// edit function
function editFunc(id)
{ 
  $.ajax({
    url: 'fetchbannerDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      $("#edit_store_name").val(response.title);
      $("#edit_active").val(response.status);
    //   $('#edit_position').html('<option value="">Select Position</option>'+for(var i=1;i>responce.length;i++){+'<option value="'+$i+'">'+$i+'</option>+ } ');

      // submit the edit from 
      $("#updateForm").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(), // /converting the form data into array and sending it to server
          dataType: 'json',
          success:function(response) {

            manageTabledata.ajax.reload(null, false); 

            if(response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');


              // hide the modal
              $("#editModal").modal('hide');
              // reset the form 
              $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');

            } else {

              if(response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#"+index);

                  id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');
                  
                  id.after(value);

                });
              } else {
                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                '</div>');
              }
            }
          }
        }); 

        return false;
      });

    }
  });
}

// remove functions 
function removeFunc(id)
{
  if(id) {
    $("#removeForm").on('submit', function() {

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: '<?= base_url()?>company/deleteterms',
        type: 'GET',
        data: { 'termsid':id }, 
        dataType: 'json',
        success:function(response) {

          manageTabledata.ajax.reload(null, false); 

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

function changeStatus(status,id)
{
    $(".text-danger").remove();

      $.ajax({
        url: '<?= base_url()?>company/changetermsstatus',
        type: 'GET',
        data: { 'termsid':id,'status':status }, 
        dataType: 'json',
        success:function(response) {

          manageTabledata.ajax.reload(null, false); 

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
}

$('#addrow').on('click',function()
{
    addrow = parseInt(addrow) + 1;
    if (addrow>0) 
    {
      $('#delrow').show();
    }
    $('#AddExtra').append('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " id="aboutrow'+addrow+'"><div class="form-group"><label for="header">Subject</label>'+
    '<input type="text" class="form-control" id="subject'+addrow+'" name="termsubject[]" placeholder="Enter Header" required autocomplete="off"></div></div><div id="addheader'+addrow+'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="form-group">'+
            '<label for="content">Content</label>'+
            '<textarea id="content'+addrow+'" name="termcontent[]" class="form-control" rows="3" required></textarea></div></div>');   
});


$('#delrow').on('click',function()
{
    $("#aboutrow"+addrow).remove();
    $("#addheader"+addrow).remove();
    if (addrow==1)
    {
      $('#delrow').hide();
    }
    addrow = parseInt(addrow) - 1;

})


</script>
