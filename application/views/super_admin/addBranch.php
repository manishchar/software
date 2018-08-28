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
				            <form role="form"  method="post" action="<?=base_url('admin/addBranch')?>" enctype="multipart/form-data">
				         	            				             
                     <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Branch Name</label>
                          <input type="text" class="form-control" id="branchName" placeholder="Enter Bussiness Name" name="branchName" required="">
                        </div>
                     </div>
				             <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Branch Code</label>
                          <input type="text" class="form-control" id="branchCode" placeholder="Branch Code" name="branchCode" required="">
                        </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Branch IFSC</label>
                          <input type="text" class="form-control" id="ifsc" placeholder="Branch IFSC" name="ifsc" required="">
                        </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Branch Address</label>
                          <textarea class="form-control" name="address"></textarea>
                        </div>
                     </div>
                    
                     <div class="clearfix"></div>
                      <!-- /.box-body -->

				              <div class="box-footer">
				                <button type="submit" class="btn btn-primary">Submit</button>
				              </div>
				            </form>
				        </div>
    			</div>
    			
				   </div>         
    		</div>
    	</section>

  </div>
  <script>
     
      
  </script>
  
  <!-- /.content-wrapper -->
  


