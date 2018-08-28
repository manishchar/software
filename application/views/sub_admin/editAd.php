  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    	<section class="content">
    		<div class="row">
    			<div class="col-md-6">
				    <div class="box box-primary">
				            <div class="box-header with-border">
				              <h3 class="box-title"><?=$heading?></h3>
				              <?=$this->session->flashdata('message')?>
				            </div>
				            <!-- /.box-header -->
				            <!-- form start -->
				            <form role="form" onsubmit="return checkImgSize()" method="post" action="<?=base_url('admin/editAD')?>" enctype="multipart/form-data">
				            	<div class="box-body">
				                <div class="form-group">
				                  <input type="hidden" name="user_login_id" value="<?=$this->session->userdata('adminId')?>"> 
                               <input type="hidden" name="add_id" value="<?=$result[0]->add_id?>"> 
				                  </select>
				                </div>
				             
				                <div class="form-group">
				                  <label for="add_name">AD Title</label>
				                  <input type="text" class="form-control" id="add_name" placeholder="Enter Add Name" name="add_name" value="<?=$result[0]->add_name?>" required="">
				                </div>
				                <div class="form-group">
				                  <label for="add_campaign_date">Date Of Campaign</label>
				                  
									<div class="input-group date">
									<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="add_campaign_date" placeholder="Date Of Campaign" name="add_campaign_date" value="<?=date('d-m-Y',strtotime($result[0]->add_campaign_date))?>" required="">
									</div>
				                </div>

				                <div class="form-group">
				                <img class="img-responsive" src="<?=base_url('resources/upload/'.$result[0]->add_img)?>" style="width: 50%;height: auto;">
				                  <label for="add_campaign_date">Banner Image</label>
				                  <input type="file" class="" id="add_img" placeholder="Enter Add Name" name="add_img" >
				                  
				                </div>
				                

				              </div>
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
  


