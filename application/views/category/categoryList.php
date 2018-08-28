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
				            <div class="box-body">
				            <div class="col-md-12">
				            <div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">Name</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div>
						 <div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">Coupon Code</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div>
						 <!-- <div class="col-md-3  searchFilterClass dataTables_search_filter"  style="padding-left: 0px;">
							<label for="firstname" class="control-label">Mobile</label>
							<input id="search" type="text" class="searchInput form-control"/>
						</div> -->
						<div class="col-md-3"  style="padding-left: 0px; margin-top: 25px;">
							<input type="reset" class="btn btn-default" value="RESET" onclick="resetPage()">
						</div>
				            <table id="categoryList" class="table table-bordered table-striped dynamicTable">
				            	<thead>
				            		<tr>
				            			<th>#</th>
				            			<th>Category Name</th>
				            			
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

  
  </script>
  
  <!-- /.content-wrapper -->
  


