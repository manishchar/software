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

                    <div class="col-sm-12">
                    <form id="form" method="GET">
                    <div class="col-sm-6">
                      <a href="<?php echo base_url().'admin/selectFields'; ?>" class="btn btn-info" >New Form</a>
                    </div>
                    <div class="col-sm-4">
                    
                      <select class="form-control" name="form" onchange="formChange();">
                      <option value="0" selected="" disabled="">Select Form</option>
                      <?php
                        if($forms){
                          foreach ($forms as $key => $forms) { ?>
                            <option value="<?php echo $forms->form_Id; ?>"
<?php if($forms->form_Id == $_GET['form']){ echo 'selected'; } ?>
                            ><?php echo $forms->form_name; ?></option>
                          <?php }
                        }
                      ?>
                    
                      </select>
                      </div>
                      <div class="col-sm-4"></div>
                    </form>
                      
                    </div>

                    <form role="form"  method="post" action="<?=base_url('admin/createForm')?>" enctype="multipart/form-data">
                       <div class="col-md-12">
                         <div class="form-group">
                          <label>Form Name</label>
                          <input type="text" class="form-control" placeholder="Form Name" value="<?php echo $formData->form_name; ?>" name="form_name" required="">
                          
                        </div>
                       </div>
                       <?php foreach ($result as $key=>$row ) { ?>
                                        
                     <div class="col-md-3">
                       <div class="form-group">
                          <label for="add_name">

<?php if($key <3){?>
<input type="checkbox" name="fields[]" value="<?=$row->dynamic_field_id?>" checked="" disabled="">
<input type="hidden" name="fields[]" value="<?=$row->dynamic_field_id?>">
<?php }else{ ?>
<input type="checkbox" name="fields[]" value="<?=$row->dynamic_field_id?>"
<?php if(in_array($row->dynamic_field_id, $dynamic_array)){ echo 'checked'; } ?>
>
  <?php } ?>
                           <?=$row->field_name?></label>
                          
                        </div>
                     </div>
                        
                      <?php } ?>       
                     <div class="clearfix"></div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                      <input type="text" name="form_id" value="<?php echo $form_id; ?>">
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
     function formChange(){ 
      //alert();
      $('#form').submit(); 
    }
      
  </script>
  
  <!-- /.content-wrapper -->
  


