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
				            <div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">AD Name</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div>

						<div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">Company Name</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div>
						<div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">Driver Name</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div>
						<div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">Driver Mobile</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div>
						<div class="col-md-3"  style="padding-left: 0px; margin-top: 5px;">
							<input type="reset" class="btn btn-default" value="RESET" onclick="resetPage()">
						</div>
				            	<table id="assigndDriverList" class="table table-bordered table-hover dynamicTable">
				            	<thead>
				            		<tr>
				            			<th>#</th>
				            			<th>AD Name</th>
				            			<th>Company Name</th>
				            			<th>Driver Name</th>
				            			<th>Driver Mobile</th>
				            			<th>Status</th>
				            			<th>Route</th>
				            			<th>Approved Status</th>
				            		</tr>
				            	</thead>
				            	
				            </table>
				          
				            	
				            
				            
				            
				    </div>        
    			</div>
				            
    		</div>
    	</section>

  </div>
  <script type="text/javascript">

  	
  </script>
  
  <!-- /.content-wrapper -->
  


