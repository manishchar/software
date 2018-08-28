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
				            <div class="box-body">
				            <div class="col-md-12">
				            <div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">User Name</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div>
						<div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">Bussiness Name</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div>
						<div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">Address Name</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div>

					
						<div class="col-md-3"  style="padding-left: 0px; margin-top: 25px;">
							<input type="reset" class="btn btn-default" value="RESET" onclick="resetPage()">
						</div>
				            <table id="branchList" class="table table-bordered table-striped table-hover dynamicTable">
				            	<thead>
				            		<tr>
				            			<th>#</th>
				            			<th>Branch Name</th>
				            			<th>Branch Code</th>
				            			<th>Branch IFSC</th>
				            			<th>Branch Address</th>
				            			<th>Action</th>
				            		</tr>
				            	</thead>
				            	<tbody>
				            	
				            	</tbody>
				            </table>
				            </div>
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
  	
  </script>
  
  <!-- /.content-wrapper -->
  


