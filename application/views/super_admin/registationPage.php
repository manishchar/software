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
				            <form role="form" onsubmit="return confirmPassword()" method="post" action="<?=base_url('admin/addCompnayReg')?>">
				              <div class="box-body">
				              	<div class="col-md-6">
				              		<div class="form-group">
				                  <label for="user_full_name">User Type</label>
                                  <select name="utype" class="form-control">
                                  <option value="3">User</option>
                                   <option value="4">Coupon Provider</option>
                                  </select>
				                  <input type="text"  id="user_full_name" placeholder="Enter Full Name" name="user_full_name" required="">
				                </div>
				              	</div>
                                    
				              	<div class="col-md-6">
				              		<div class="form-group">
				                  <label for="user_full_name">User Full Name</label>
				                  <input type="text" class="form-control" id="user_full_name" placeholder="Enter Full Name" name="user_full_name" required="">
				                </div>
				              	</div>
				              	<div class="col-md-6">
				              		<div class="form-group">
				                  <label for="user_email">User Email</label>
				                  <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter Email">
				                </div>
				              	</div>
				                
				                <div class="col-md-6">
				                	<div class="form-group">
				                  <label for="user_mobile">User Mobile</label>
				                  <input type="text" class="form-control" id="user_mobile" name="user_mobile" placeholder="Enter Mobile" required="">
				                </div>
				                </div>

				                
				                <div class="col-md-12">
				                	<div class="form-group">
				                  <label for="user_address">User Address</label>
				                  <textarea class="form-control"  id="user_address" name="user_address" placeholder="Enter Address"></textarea>
				                </div>
				                </div>
				                
				                <div class="col-md-6">
				                	<div class="form-group" id="p1">
				                  <label for="user_password">Password</label>
				                  <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" required="" onblur="removeClass()">
				                </div>
				                </div>
				                <div class="col-md-6">
				                	<div class="form-group" id="p2">
				                  <label for="cnf_password">Confirm Password</label>
				                  <input type="password" class="form-control" id="cnf_password" name="cnf_password" placeholder="Password" required="" onblur="removeClass()">
				                </div>
				                </div>
 <div class="box-footer">
				                <button type="submit" class="btn btn-primary">Submit</button>
				              </div>
				                

				              </div>
				              <!-- /.box-body -->

				             
				            </form>
				        </div>
    			</div>
    			<div class="col-md-6">
    				<div class="box box-primary">
				            <div class="box-header with-border">
				              <h3 class="box-title"><?=$heading2?></h3>
				              
				            </div>
				            <table id="compnayList" class="table table-bordered table-hover">
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
				            	<?php $i=1;foreach($result as $row) { ?>
				            		<tr>
				            			<td><?=$i++?></td>
				            			<td><?=$row->user_full_name?></td>
				            			<td><?=$row->user_email?></td>
				            			<td><?=$row->user_mobile?></td>
				            			<td><a href="#"><i class="glyphicon glyphicon-edit"></i></a> | <a><i class="glyphicon glyphicon-ban-circle"></i></a> | <a><i class="glyphicon glyphicon-ok-circle"></i></a></td>
				            		</tr>
				            		<?php } ?>
				            	</tbody>
				            </table>
				    </div>        
    			</div>
				            
    		</div>
    	</section>

  </div>
  <script type="text/javascript">

  	var confirmPassword=function(){
  		
  		if($('#cnf_password').val()!=$('#user_password').val())
  		{
  				$("#p1,#p2").addClass('has-error');
  				alert("Password Mismatched");
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
  


