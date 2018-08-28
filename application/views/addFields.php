<style>
  
</style>

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
                    <div class="box-body">
                    <form role="form"  method="post" action="<?=base_url('admin/addFields')?>" enctype="multipart/form-data">
                                                   
                     <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Filds Name</label>
                          <input type="text" class="form-control" id="field_name" placeholder="Field Name" name="field_name" required="">
                        </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Required Filed</label>
                          
                          <select class="form-control" name="is_required" required="">
                            <option value="">Select</option>
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                          </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Feild Type</label>
                         <select class="form-control" name="field_type" required="">
                           <option value="">Select</option>
                           <option value="text">Text</option>
                           <option value="number">Number</option>
                           <option value="email">Email</option>
                           <option value="date">Date</option>
                           <option value="mobile">mobile</option>
                           <option value="amount">Amount</option>
                         </select>
                        </div>
                     </div>
                     
                    
                     <div class="clearfix"></div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
          </div>
          
           </div>         
        </div>
      </section>

  </div>
  <script>
     
      
  </script>
  
  <!-- /.content-wrapper -->
  


