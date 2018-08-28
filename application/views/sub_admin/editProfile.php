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
				            <form role="form" onsubmit="return confirmPassword()" method="post" action="<?=base_url('admin/addCompnayEditData')?>">
				            
				              <div class="box-body">
				                <div class="form-group">
				                  <label for="user_full_name">User Full Name</label>
				                  <input type="hidden" name="regKey" value="<?=$editData[0]->user_login_id?>">
				                  <input type="text" class="form-control" id="user_full_name" placeholder="Enter Full Name" name="user_full_name" value="<?=$editData[0]->user_full_name?>" required="">
				                </div>
				                <div class="form-group">
				                  <label for="user_email">User Email</label>
				                  <input type="email" class="form-control" id="user_email" name="user_email" value="<?=$editData[0]->user_email?>" placeholder="Enter Email">
				                </div>

				                <div class="form-group">
				                  <label for="user_mobile">User Mobile</label>
				                  <input type="text" class="form-control" id="user_mobile" name="user_mobile" placeholder="Enter Mobile" value="<?=$editData[0]->user_mobile?>"required="">
				                </div>

				                <div class="form-group">
				                  <label for="user_address">User Address</label>
				                  <textarea class="form-control" id="user_address" name="user_address" placeholder="Enter Address"><?=$editData[0]->user_address?></textarea>
				                </div>
				                
				                <div class="form-group" id="p1">
				                  <label for="user_password">Password <em style="color:red"> (Note : Does Not Need To change, Left Blank)</em></label>
				                  <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password"  onblur="removeClass()">
				                </div>

				                <div class="form-group" id="p2">
				                  <label for="cnf_password">Confirm Password</label>
				                  <input type="password" class="form-control" id="cnf_password" name="cnf_password" placeholder="Password"  onblur="removeClass()">
				                </div>

				              </div>
				              <!-- /.box-body -->

				              <div class="box-footer">
				                <button type="submit" class="btn btn-primary">Update</button>
				              </div>
				            </form>
				        </div>
    			</div>
    			<!-- <div class="col-md-6">
    				<div class="box box-primary">
				            <div class="box-header with-border">
				              <h3 class="box-title"><?=$heading2?></h3>
				              
				            </div>
				            <div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">Name</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div>
						 <div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">Email</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div>
						 <div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">Mobile</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div>
				            <table id="compnayList" class="table table-bordered table-striped dynamicTable">
				            	<thead>
				            		<tr>
				            			<th>#</th>
				            			<th>Name</th>
				            			<th>Email</th>
				            			<th>Mobile</th>
				            			<th>Action</th>
				            		</tr>
				            	</thead>
				            	<tbody>
				            	
				            	</tbody>
				            </table>
				    </div> -->        
    			</div>
				            
    		</div>
    	</section>

  </div>
  <script type="text/javascript">

  	var confirmPassword=function(){
  		
  		if($('#cnf_password').val()!=$('#user_password').val())
  		{
  				$("#p1,#p2").addClass('has-error');
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
  


