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
				            <form role="form" onsubmit="return confirmPassword()" method="post" action="<?=base_url('admin/addDriverReg')?>">
				              <div class="box-body">
				                <div class="form-group">
				                  <label for="user_full_name">User Full Name</label>
				                  <input type="text" class="form-control" id="user_full_name" placeholder="Enter Full Name" name="user_full_name" required="">
				                </div>
				                <div class="form-group">
				                  <label for="user_email">User Email</label>
				                  <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter Email" required="">
				                </div>

				                <div class="form-group">
				                  <label for="user_DOB">User DOB</label>
				                  <input class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" type="text" id="user_DOB" name="user_DOB" required="">
				                </div>

				                <div class="form-group">
				                  <label for="user_mobile">User Mobile</label>
				                  <input type="text" class="form-control" id="user_mobile" name="user_mobile" placeholder="Enter Mobile" required="">
				                </div>

				                <div class="form-group">
				                  <label for="user_mobile">User Licence</label>
				                  <input type="text" class="form-control" id="user_licence_number" name="user_licence_number" placeholder="Enter Licence Number" required="">
				                </div>
				                

				                <div class="form-group">
				                  <label for="user_address">User Address</label>
				                  <textarea class="form-control" id="user_address" name="user_address" placeholder="Enter Address" required=""></textarea>
				                </div>
				                
				                	<div class="form-group">
				                  <label for="user_mobile">User State</label>
				                  <input type="text" class="form-control" id="user_state" name="user_state" placeholder="Enter State" required="">
				                </div>
				                <div class="form-group">
				                  <label for="user_mobile">User City</label>
				                  <input type="text" class="form-control" id="user_city" name="user_city" placeholder="Enter City" required="">
				                </div>
				                <div class="form-group">
				                  <label for="user_mobile">User Post Code</label>
				                  <input type="text" class="form-control" id="user_post_code" name="user_post_code" placeholder="Enter Post Code" required="">
				                </div>

				                <div class="form-group" id="p1">
				                  <label for="user_password">Password</label>
				                  <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" required="" onblur="removeClass()">
				                </div>

				                <div class="form-group" id="p2">
				                  <label for="cnf_password">Confirm Password</label>
				                  <input type="password" class="form-control" id="cnf_password" name="cnf_password" placeholder="Password" required="" onblur="removeClass()">
				                </div>

				              </div>
				              <!-- /.box-body -->

				              <div class="box-footer">
				                <button type="submit" class="btn btn-primary">Submit</button>
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
				            <table id="DriverList" class="table table-bordered table-striped dynamicTable">
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
				    </div>        
    			</div> -->
				            
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
  


