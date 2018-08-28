<style>
  
</style>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title"><?=$heading?></h3>
                      <?=$this->session->flashdata('message')?>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                   
                      <div class="col-md-8">
                         <div class="col-md-6 form-group">
                            <label for="add_name">Form Name : <?=$result['form'][0]->form_name?></label>
                            
                          </div>
                          <div class="col-md-6 form-group">
                            <label for="add_name">Branch : <?=$branch->branchName?></label>
                            
                          </div>  
                      </div>
                      <div class="col-md-4 text-right">
                        <button type="button" class="btn btn-info" onclick="uploadModel()">Upload Record</button>
                      </div>
 <div class="col-md-12" style="border-bottom: 1px outset gray;padding: 10px;margin-bottom: 10px;">
                      <div class="col-sm-12 form-group">
                        <div class="col-md-4 ui-widget">
                         <input type="text" id="fileNumber" name="fileNumber" placeholder="search By File Number" class="form-control">
                        </div>
                        <div class="col-md-4 ui-widget">
                         <input type="text" id="search" name="search" placeholder="search By Account Number" class="form-control">
                        </div>

                        <div class="col-md-4 ui-widget">
                         <input type="text" id="oldFileNumber" name="oldFileNumber" placeholder="Old File Number" class="form-control">
                        </div>
                      </div>
                    </div>
                    <form role="form"  method="post" id="formRecords" onsubmit="return formRecords(this)">
                     <div class="clearfix"></div>
                     <?php foreach ($result['fields'] as $k=>$row) {
                              if($row->is_required==1)
                              {
                                $req='required';
                              }
                              else
                              {
                                $req='';
                              }
                      ?>
                       
                      
                     <div class="col-md-4">
                       <div class="form-group">
                          <label for="add_name"><?=$row->field_name?></label>
                          <input type="hidden" name="dynamic_field_id[]" value="<?=$row->dynamic_field_id?>">
                          <input type="hidden" name="dynamic_field_name[]" value="<?=$row->field_name?>">
                          <input type="<?=$row->field_type?>" class="form-control myform" name="field_value[]" id="field<?=$k?>" <?=$req?>>
                        </div>
                     </div>
                     <?php  } ?>
                 <div class="clearfix"></div>
                      <!-- /.box-body -->
                      <input type="hidden" id="form_id" placeholder="Field Name" name="form_id" value="<?=$result['form'][0]->form_Id?>" required="">
                      <input type="hidden" name="branch_id" id="branch_id" value="<?=$branch->branchId;?>">
                      <input type="hidden" name="record_id" id="record_id" value="" class="myform">
                      <div class="box-footer">
                        <input type="submit" id="recordSave" class="btn btn-info" name="save" value="Save">
                        <a href="<?php echo base_url().'admin/selectForm'; ?>" class="btn btn-warning">Back</a>                        
                        <span id="errorMessageForm"></span>
                      </div>
                    </form>


  
                </div>


          </div>
          



           </div>         
        </div>
      </section>

  </div>



    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Customer Entry</h4>
      </div>
      <div class="modal-body">
      <span class="text text-danger">Condition : </span>
      <span id="conditionMsg"> All Record Save</span>
      <br/>
      <div class="file-upload">
      
        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger('click')">Add File</button>
        <form  class="form-horizontal" role="form" id="uploadForm" onsubmit="return uploadForm(this)">
          <div class="col-sm-12 form-group">
            <input type="hidden" name="form_id" value="<?php echo $form_id; ?>">
            <input type="hidden" name="branch_id" value="<?=$branch->branchId;?>">
            <input type="hidden" id="uaccount" name="uaccount">
            <input type="hidden" id="ufileNo" name="ufileNo">
            <input type="hidden" id="uoldFileNo" name="uoldFileNo">
            <!-- <input type="file" name="files" id="selectfile"> -->

            <div class="image-upload-wrap">
              <input class="file-upload-input" type="file" id="selectfile" name="files"/>
              <div class="drag-text">
              <h3>Drop Your File here</h3>
              </div>
            </div>
            <div class="col-sm-12 form-group">
                
                <i id="show" style="display: none;" class="text text-success fa fa-check" aria-hidden="true"></i>
                <i id="hide" class="text text-danger fa fa-times" aria-hidden="true"></i>
                <span id="fileName">&nbsp;No File Selected</span>
            </div>
          </div>
          <div class="col-sm-12 form-group">

          <input type="submit" class="btn btn-info" name="upload"  id="upload" value="Upload">
            <span id="errorMessage"></span>
          </div>
        </form>
      </div>
      </div>

      <div class="modal-footer">
            
            </div>

      
    </div>

  </div>
</div>

<style type="text/css">
.file-upload {
  background-color: #ffffff;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 5px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 10px;
  border: 4px dashed #1FB264;
  position: relative;
  width: 106%;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
  line-height:100px;
}

.drag-text h3 {
  font-weight: 20;
  text-transform: uppercase;
  color: #15824B;
  padding: 0px 0;
  display: inline-table;
}

.file-upload-image {
  max-height: 200px;
  max-width: 250px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}

</style>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
function uploadModel(){

//fileNumber search oldFileNumber 
$('#selectfile').val('');
$('#errorMessage').html('');
$('#fileName').html('&nbsp;No File Selected');
$('#show').hide();
$('#hide').show();
if($('#fileNumber').val() == '' && $('#search').val() == '' && $('#oldFileNumber').val() == ''){
  $('#conditionMsg').html('All Records Save');
  //All Record Save
}else if($('#fileNumber').val() != '' && $('#search').val() != '' && $('#oldFileNumber').val() != ''){
  var msg = "File Number = "+$('#fileNumber').val()+ " Account Number = "+$('#search').val()+" Old File No = "+ $('#oldFileNumber').val();
  $('#conditionMsg').html(msg + " Records Save");
}else{
  var msg = "";
  if($('#fileNumber').val() != ''){
    msg += "File Number = "+$('#fileNumber').val();
  }
  if($('#search').val() != ''){
    msg += "Account Number = "+$('#search').val();
  }
  if($('#oldFileNumber').val() != ''){
    msg += "Old File No = "+$('#oldFileNumber').val();
  }
  $('#conditionMsg').html(msg + " Records Save");
}

  $('#myModal').modal('show');

  //conditionMsg
}

  $('#selectfile').change(function(){
    if($(this).val() == ''){
      $('#hide').show();
      $('#show').hide();
       $('#fileName').html(' No File Selected');
    }else{
      $('#hide').hide();
      $('#show').show();
      var url = $(this).val();
      var arrVars = url.split("\\");
      var name = arrVars.pop();
      $('#fileName').html(' '+name);
    }
  });
    $('#search').keyup(function(){
      console.log($(this).val());
      $('#uaccount').val($(this).val());
    });

    $('#fileNumber').keyup(function(){
      console.log($(this).val());
      $('#ufileNo').val($(this).val());
    });

    $('#oldFileNumber').keyup(function(){
      console.log($(this).val());
      $('#uoldFileNo').val($(this).val());
    });

var base_url = "<?php echo base_url(); ?>";

$(function() 
{

 $( "#fileNumber" ).autocomplete({
  source: base_url+"admin/fileNoSearch?form_id=" + $('#form_id').val() +"&",
  select: function( event, ui ) {
    //console.log(event.type);
    //console.log(ui.item.label);
    $( "#fileNumber" ).val(ui.item.label);
    //console.log($('#search').val());
   if(ui.item.label == 'No Result'){
    resetfield();
    $('#recordSave').val('Save Records');
    $('#recordSave').prop('disabled',false);
   }else{
    getRecords(ui.item.label);
   }
  }
 });

$( "#oldFileNumber" ).autocomplete({
  source: base_url+"admin/oldFileNoSearch?form_id=" + $('#form_id').val() +"&",
  select: function( event, ui ) {
    //console.log(event.type);
    $('#oldFileNumber').val(ui.item.label);
    //console.log($('#search').val());
   if(ui.item.label == 'No Result'){
    resetfield();
    $('#recordSave').val('Save Records');
    $('#recordSave').prop('disabled',false);
   }else{
    getRecords(ui.item.label);
   }
  }
 });


 $( "#search" ).autocomplete({
  source: base_url+"admin/search?form_id=" + $('#form_id').val() +"&",
  select: function( event, ui ) {
    //console.log(event.type);
    $('#search').val(ui.item.label);
    //console.log($('#search').val());
   if(ui.item.label == 'No Result'){
    resetfield();
    $('#recordSave').val('Save Records');
    $('#recordSave').prop('disabled',false);
   }else{
    getRecords(ui.item.label);
   }
  }
 });
});

function resetfield(){

$('.myform').each(function(){
  $(this).val('');
});  
}
function formRecords(obj){


$.ajax({
        type: "POST",
        url: base_url+"/admin/saveRecord",
        data:$(obj).serialize(),
        beforeSend(xhr){
          //$('#recordSave').prop('disabled',true);
          $('#errorMessageForm').html('');
            //alert('before');
        },
         success: function(result){
            //alert(result);
            console.log(result);
              var obj = JSON.parse(result);
             if(obj.result == 'success'){
              if(obj.status == '1'){
                $('#recordSave').prop('disabled',true);
                $('#errorMessageForm').html('<span class="text text-success">'+obj.message+'</span>');
              }
             
              
            //   $('#errorMessage').html('<span class="text text-success">'+obj.message+'</span>');
              //location.reload();
             }

             if(obj.result == 'failed'){
              $('#recordSave').prop('disabled',false);
              // $('#recordSave').val('Save Record');  
               $('#errorMessageForm').html('<span class="text text-danger">'+obj.message+'</span>');

             }
       
       
       
         },error: function(data){
              //  alert("error111");
                console.log(data);
            },complete: function(){
                //alert('complete');
               // $('#upload').val('Upload');
               // $('#upload').prop('disabled',false);
               // $('#saveLoader').hide();
         }  
    });

return false;
}

function getRecords(account ='',fileNumber='',oldFileNumber=''){
resetfield();
var form_id = $('#form_id').val();
var oldFileNumber = $('#oldFileNumber').val();
var account = $('#search').val();
var fileNumber = $('#fileNumber').val();
console.log('old = '+oldFileNumber+'search = '+search+'fileNumber = '+fileNumber)
  $.ajax({
        type: "POST",
        url: base_url+"/admin/getRecord",
        data:{oldFileNumber:oldFileNumber,fileNumber:fileNumber,account:account,form_id:form_id},
        beforeSend(xhr){
          $('#recordSave').prop('disabled',true);
          $('#errorMessageForm').html('');
          $('#record_id').val('');
  //          alert('before');
        },
         success: function(result){
//            alert(result);
            console.log(result);
             var obj = JSON.parse(result);
             if(obj.result == 'success'){
              if(obj.status == '1'){
                var target = JSON.parse(obj.data.data);
                var k=0;
                $('#record_id').val(obj.data.dynamic_fields_value_id);
                $('#recordSave').prop('disabled',false);
                $('#recordSave').val('Update Record');
                for (var prop in target) {
                //alert("Key is " + prop + ", value is" + target[prop]);
                $('#field'+k).val(target[prop]);
                k++;
                }
              }
              if(obj.status == '2'){
                $('#record_id').val('');
                $('#field1').val(account);
                $('#recordSave').prop('disabled',false);
                $('#recordSave').val('Save Record');
                $('#errorMessageForm').html('<span class="text text-success">'+obj.message+'</span>');
              }
              
            //   $('#errorMessage').html('<span class="text text-success">'+obj.message+'</span>');
            // location.reload();
             }

             if(obj.result == 'failed'){
             $('#record_id').val('');
             $('#recordSave').prop('disabled',true);
                $('#recordSave').val('Save Record');  
               $('#errorMessageForm').html('<span class="text text-danger">'+obj.message+'</span>');

             }
       
       
       
         },error: function(data){
                //alert("error111");
                console.log(data);
            },complete: function(){
                //alert('complete');
               // $('#upload').val('Upload');
               // $('#upload').prop('disabled',false);
               // $('#saveLoader').hide();
         }  
    });

}

function uploadForm(obj){
  //alert();

var formData = new FormData(obj);
   $.ajax({
        type: "POST",
        url: base_url+"/admin/uploadData",
        cache:false,
        contentType: false,
        processData: false,
        data:formData,
        beforeSend(xhr){     
                $('#upload').val('Loding.....');
                $('#errorMessage').html('');
                $('#upload').prop('disabled',true);
        },
         success: function(result){
            getRecords();
            // console.log(result);
            // return false;
            var obj = JSON.parse(result);
            if(obj.result == 'success'){

              $('#errorMessage').html('<span class="text text-success">'+obj.message+'</span>');
               //location.reload();
               $('#myModal').modal('hide');
            }

            if(obj.result == 'failed'){
              
              $('#errorMessage').html('<span class="text text-danger">'+obj.message+'</span>');

            }
       
       
       
         },error: function(data){
                //alert("error111");
                console.log(data);
            },complete: function(){
                //alert('complete');
               $('#upload').val('Upload');
               $('#upload').prop('disabled',false);
               // $('#saveLoader').hide();
         }  
    });



  return false;
}
  </script>
  
  <!-- /.content-wrapper -->
  


