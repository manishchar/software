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
				            <form role="form" onsubmit="return checkImgSize()" method="post" action="<?=base_url('admin/addBranch')?>" enctype="multipart/form-data">
				            	<div class="box-body">
				             
				             <div class="form-group">
				             <input type="hidden" name="user_login_id" value="<?=$this->session->userdata('adminId')?>">
				                  
				                </div>
				                <div class="form-group">
				                  <label for="add_name">Branch Title</label>
				                  <input type="text" class="form-control" id="branch_name" placeholder="Enter Branch Name" name="branch_name" required="">
				                </div>
				                <div class="form-group">
				                  <label for="add_campaign_date">Branch Address</label>
				                  
  <textarea name="branch_address" class="form-control" required style="resize:none;"></textarea>
									
				              <!-- /.box-body -->

				              <div class="box-footer">
				                <button type="submit" class="btn btn-primary">Submit</button>
				              </div>
				            </form>
				        </div>
    			</div>
    			
				            
    		</div>
    	</section>

  </div>
  <script type="text/javascript">

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
  </script>
  
  <!-- /.content-wrapper -->
  


