  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    	<section class="content">
    		<div class="row">
    			<div class="col-md-12" >
    			<div class="col-md-12" >
	    			
	    				<div class="box box-primary">
					            <div class="box-header with-border">
					              <h3 class="box-title"><?=$heading2?></h3>
					              <?=$this->session->flashdata('message')?>
					            </div>
					<div class="col-md-12">
					    <form>
					        <div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
								<label for="firstname" class="control-label">Form Type</label>
								<select class="form-control" name="form_id">
									<option>Select Form</option>
									<?php
									if($forms){
										foreach ($forms as $key => $form) { ?>
											<option value="<?php echo $form->form_Id; ?>" <?php if($form->form_Id == $_GET['form_id']){ echo "selected"; } ?>><?php echo $form->form_name; ?></option>
										<?php }
									}
									?>
								</select>
							</div>
					        <div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
								<label for="firstname" class="control-label">Account Number</label>
								<input id="search" type="text" name="accountNumber" class="searchInput form-control" value="<?php echo $_GET['accountNumber']; ?>" />
							</div>
							<div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
								<label for="firstname" class="control-label">File Number</label>
								<input id="search" type="text" name="fileNumber" class="searchInput form-control" value="<?php echo $_GET['fileNumber']; ?>" />
							</div>
							<div class="col-md-3"  style="padding-left: 0px; margin-top: 25px;">
								<input type="submit" class="btn btn-default" value="Search">
								<input type="reset" class="btn btn-default" value="RESET" onclick="resetPage()">
							</div>

						</form>
					</div>	

				            <table id="" class="table table-bordered table-striped dynamicTable">
				            	<thead>
				            		<tr>
				            			<th>#</th>
				            			<th>Form Name</th>
				            			<th>Branch Name</th>
				            			<th>Account</th>
				            			<th>Action</th>
				            		</tr>
				            	</thead>
				            	<tbody>
				            	<?php
				            	$i = 1;
				            	foreach ($dynamicRecords as $key => $dynamicRecord) { ?>
				            		<tr>
				            			<td><?php echo $i++; ?></td>
				            			<td><?php echo $dynamicRecord->form_name; ?></td>
				            			<td><?php echo $dynamicRecord->branchName; ?></td>
				            			<td><?php echo $dynamicRecord->accountNumber; ?></td>
				            			<td><?php echo $dynamicRecord->accountNumber; ?></td>
				            			
				            		</tr>
				            	<?php }
				            	?>
				            	</tbody>
				            </table>
				            </div>
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
  	var resetPage = function()
  	{
  		location.reload();
  	}
  </script>
  
  <!-- /.content-wrapper -->
  


