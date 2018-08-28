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
                      
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                    <div class="col-sm-12">
                      <?php if($this->session->flashdata('message')){ ?>
                      <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?php echo $this->session->flashdata('message'); ?>
              </div>
                      
                        <?php } ?>

                        <?php if($this->session->flashdata('error')){ ?>
                           <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?php echo $this->session->flashdata('error'); ?>
              </div>
                        <?php } ?>
                    </div>
                    <form role="form"  method="post" action="<?=base_url('admin/form')?>" enctype="multipart/form-data">
                       <div class="col-md-12">
                         <div class="form-group">
                          <label for="add_name">Select Branch</label>
                          <select class="form-control" name="branch_id" id="branch_id" required="">
                            <option value="">Select Branch</option>
                            <?php foreach ($branches as $branch) { ?>
                              <option value="<?=$branch->branchId?>"><?=$branch->branchName?></option>
                            <?php } ?>
                          </select>
                          
                        </div>
                       </div>
                      
                       <div class="col-md-12">
                         <div class="form-group">
                          <label for="add_name">Select Form</label>
                          <select class="form-control" name="form_id" id="form_id" required="">
                            <option value="">Select Form</option>
                            <?php foreach ($result as $row) { ?>
                              <option value="<?=$row->form_Id?>"><?=$row->form_name?></option>
                            <?php } ?>
                          </select>
                          
                        </div>
                       </div>
                             
                     <div class="clearfix"></div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Proceed Next</button>
                      </div>
                    </form>
                </div>
          </div>
          
           </div>         
        </div>
      </section>

  </div>
  <script type="text/javascript">
     
   
      
  </script>
  
  <!-- /.content-wrapper -->
  


