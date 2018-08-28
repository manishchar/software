  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    	<section class="content">
    		<div class="row">
    			<div class="col-md-12" >
    				<div class="box box-primary">
				            <div class="box-header with-border">
				              <h3 class="box-title"><?=$heading2?></h3>
				              
				            </div>
				        <div class="col-md-12">
                <div class="col-md-12">
<?php if($this->session->flashdata('message')){ ?>
<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                 <?php echo $this->session->flashdata('message'); ?>
</div>
<?php } ?>                  

<?php if($this->session->flashdata('error')){ ?>
<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                 <?php echo $this->session->flashdata('error'); ?>
</div>
<?php } ?>                  

                </div>

                
				       <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Import Header</button>
				            <div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">Field Name</label>
							<input id="search" type="text" class="searchInput form-control"/>
							</div>
							 <div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
								<label for="firstname" class="control-label">Filed Type</label>
								<input id="search" type="text" class="searchInput form-control"/>
							</div>
						 <!-- <div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">Mobile</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div> -->
						<div class="col-md-3"  style="padding-left: 0px; margin-top: 25px;">
							<input type="reset" class="btn btn-default" value="RESET" onclick="resetPage()">
						</div>
				            <table id="fieldList" class="table table-bordered table-striped dynamicTable">
				            	<thead>
				            		<tr>
				            			<th>#</th>
				            			<th>Field Name</th>
				            			<th>Field Type</th>
				            			<th>Requierd filed</th>
				            			
				            			<th>Action</th>
				            		</tr>
				            	</thead>
				            	<tbody>
				            	
				            	</tbody>
				            </table>
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
        <h4 class="modal-title">Add Header</h4>
      </div>
      <div class="modal-body">
      <form  class="form-horizontal" role="form" id="uploadForm" onsubmit="return uploadForm(this)">
       	<div class="col-sm-12 form-group fileSelect">
       		<input type="file" name="files" onchange="fileChange(this)" required="">
       	</div>
       	<div class="col-sm-12 form-group">

       		<input type="submit" class="btn btn-info" name="upload"  id="upload" value="Save">
       		<span id="errorMessage">&nbsp;</span>
       	</div>
      </form>
      </div>

      <div class="modal-footer">
            
            </div>

      
    </div>

  </div>
</div>

<style type="text/css">
  .fileSelect{
        border-style: inset;
    padding: 13px;
    margin-left: 1px;
  }
</style>
  <script type="text/javascript">
  var base_url = "<?php echo base_url(); ?>";
function uploadForm(obj){
	//alert();

var formData = new FormData(obj);
   $.ajax({
        type: "POST",
        url: base_url+"/admin/uploadHeader",
        cache:false,
        contentType: false,
        processData: false,
        data:formData,
        beforeSend(xhr){
            //alert('before');
			//           $('#show').hide();
			//           $('#hide').hide();
                $('#upload').val('Loading.....');
                $('#errorMessage').html('');
                $('#upload').prop('disabled',true);
               // $('#saveLoader').show();
        },
         success: function(result){
            //alert(result);
            //console.log(result);
            var obj = JSON.parse(result);
            if(obj.result == 'success'){

            	$('#errorMessage').html('<span class="text text-success">'+obj.message+'</span>');
        		location.reload();
            }

            if(obj.result == 'failed'){
            	
            	$('#errorMessage').html('<span class="text text-danger">'+obj.message+'</span>');

            }
       
       
       
         },error: function(data){
                //alert("error111");
                console.log(data);
            },complete: function(){
               // alert('complete');
               $('#upload').val('Upload');
               $('#upload').prop('disabled',false);
               // $('#saveLoader').hide();
         }  
    });



	return false;
}
  	var checkImgSize=function(){
  		
  		var file_size = $('#add_img')[0].files[0].size;
	if(file_size>2097152) {
		alert("File Size Grater Than 2MB");
		return false;
  		}
  		else
  		{
  			return true;
  		}
  	}
  	var removeClass=function(){
  		
  		$("#p1,#p2").removeClass('has-error');
  	}
  	var resetPage = function()
  	{
  		location.reload();
  	}

    function fileChange(obj){
    //console.log('file select');
    var flag = false;
    fileName = $(obj).val();
    fileExtension = fileName.substr((fileName.lastIndexOf('.') + 1));
    if(fileExtension == 'xls' || fileExtension=='xlsx'){
      flag = true;
    }else{
      flag = false;
    }

    if(flag){
        console.log('correct');
        //$('#resumeForm').submit();
      }else{
        $('#errorMessage').html('<span class="text text-danger">Invalid Format</span>').fadeIn(2000);
        $(obj).val('');
      }
    return false;
}
  </script>
  
  <!-- /.content-wrapper -->
  


