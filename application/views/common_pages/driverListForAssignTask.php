  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    	<section class="content">
    		<div class="row">
    			
    			<div class="col-md-12">
    				<div class="box box-primary">
				            <div class="box-header with-border">
				              <h3 class="box-title"><?=$heading2?></h3>
				              
				            </div>
				            <form action="<?=base_url('admin/sendRequestToDriver')?>" method="post">
				            	<table id="compnayList" class="table table-bordered table-hover">
				            	<thead>
				            		<tr>
				            			<th>#</th>
				            			<th>Select</th>
				            			<th>Name</th>
				            			<th>Email</th>
				            			<th>Mobile</th>
				            			<th>Action</th>
				            		</tr>
				            	</thead>
				            	<tbody>
				            	<?php $i=1;foreach($DriverList as $row) { ?>
				            		<tr>
				            			<td><?=$i++?></td>
				            			<td><input type="checkbox" name="user_login_id[]" value="<?=$row->user_login_id?>"></td>
				            			<td><?=$row->user_full_name?></td>
				            			<td><?=$row->user_email?></td>
				            			<td><?=$row->user_mobile?></td>
				            			<td><a href="#"><i class="glyphicon glyphicon-user"></i></a></td>
				            		</tr>
				            		<?php } ?>
				            	</tbody>
				            </table>
				            <div class="box-footer">
				                <button type="submit" class="btn btn-primary">SEND REQUEST</button>
				              </div>
				            	
				            
				            </form>
				            
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
  


