  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    	<section class="content">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="box box-primary">
				            <div class="box-header with-border">
				              <h3 class="box-title"><?=$heading2?></h3>
				              <?=$this->session->flashdata('message')?>
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
						<div class="col-md-3"  style="padding-left: 0px; margin-top: 25px;">
							<input type="reset" class="btn btn-default" value="RESET" onclick="resetPage()">
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
  


