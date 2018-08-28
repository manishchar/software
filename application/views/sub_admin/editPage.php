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
				            
				              
				              	<div class="col-md-6">
				              		<div class="form-group">
				                  <label for="user_full_name">User Full Name</label>
				                  <input type="hidden" name="regKey" value="<?=$editData[0]->user_login_id?>">
				                  <input type="text" class="form-control" id="user_full_name" placeholder="Enter Full Name" name="user_full_name" value="<?=$editData[0]->user_full_name?>" required="">
				                </div>
				              	</div>
				                <div class="col-md-6">
				                	<div class="form-group">
				                  <label for="user_email">User Email</label>
				                  <input type="email" class="form-control" id="user_email" name="user_email" value="<?=$editData[0]->user_email?>" placeholder="Enter Email">
				                </div>
				                </div>
				                
				                <div class="col-md-6">
				                	<div class="form-group">
				                  <label for="user_mobile">User Mobile</label>
				                  <input type="text" class="form-control" onkeypress="return isNumberKey(event)" maxlength="10" minlength="7" id="user_mobile" name="user_mobile" placeholder="Enter Mobile" value="<?=$editData[0]->user_mobile?>"required="">
				                </div>
				                </div>
				                <div class="col-md-6">
				                	<div class="form-group">
				                  <label for="user_address">User Address</label>
				                  <textarea class="form-control"  id="user_address" name="user_address" placeholder="Enter Address"><?=$editData[0]->user_address?></textarea>
				                </div>
				                </div>
				                <div class="col-md-6">
                              	<div class="form-group">
				                  <label for="city">City</label>
				                  <input type="text" class="form-control" value="<?=$editData[0]->city?>" id="city" name="city" placeholder="Enter City">
				                </div>
                              </div>

                              	 <div class="col-md-6">
                              	<div class="form-group">
				                  <label for="state">State</label>
				                  <input type="text" class="form-control" id="state" name="state" value="<?=$editData[0]->state?>" placeholder="Enter State">
				                </div>
                              </div>

                              <div class="col-md-6">
                              	<div class="form-group">
				                  <label for="country">Country</label>
				                  <input type="text" class="form-control" id="country" name="country" value="<?=$editData[0]->country?>" placeholder="Enter Country">
				                </div>
                              </div>

                               <div class="col-md-6">
                              	<div class="form-group">
				                  <label for="zip">Zip</label>
				                  <input type="text" class="form-control" id="zip" name="zip"  name="country" value="<?=$editData[0]->zip?>" placeholder="Enter Zip">
				                </div>
                              </div>
				                <div class="col-md-6">
				                	<div class="form-group" id="p1">
				                  <label for="user_password">Password <em style="color:red"> (Note : Does Not Need To change, Left Blank)</em></label>
				                  <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password"  onblur="removeClass()">
				                </div>
				                </div>
				                <div class="col-md-6">
				                	<div class="form-group" id="p2">
				                  <label for="cnf_password">Confirm Password</label>
				                  <input type="password" class="form-control" id="cnf_password" name="cnf_password" placeholder="Password"  onblur="removeClass()">
				                </div>
				                </div>
				                <div class="clearfix"></div>
				                 <div class="box-footer">
				                <button type="submit" class="btn btn-primary">Update</button>
				              </div>

				                

				           
				              <!-- /.box-body -->

				             
				            </form>
				        </div>
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
  			return check();
  			//return true;
  		}
  	}
  	var removeClass=function(){
  		
  		$("#p1,#p2").removeClass('has-error');
  	}

  	 	function check()
   {
       var mo=$("#user_mobile").val();
   var phoneNum = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/; 
    var e=$("#email").val();
     var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      
   
    if (phoneNum.test(mo)==false || mobile=="")
    {
    alert("Please Enter Valid mobile Number");
       //$("#errorShow").css("display","block");
     return false;
       
    }       
 
   }
  </script>
  
  <!-- /.content-wrapper -->
  


