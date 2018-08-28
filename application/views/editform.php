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
                      
                    <form role="form"  method="post" action="<?=base_url('admin/editForm')?>" enctype="multipart/form-data">
                               
                     <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Form Name : <?=$result1[0]->form_name?></label>
                          <input type="hidden" class="form-control" id="form_id" placeholder="Field Name" name="form_id" value="<?=$result1->form_Id?>" required="">
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <?php $i=0; foreach ($result3 as $row) {
                              if($row->is_required==1)
                              {
                                $req='required';
                              }
                              else
                              {
                                $req='';
                              }
                      ?>
                       
                      
                     <div class="col-md-4">
                       <div class="form-group">
                          <label for="add_name"><?=$row->field_name?></label>
                          <input type="hidden" name="dynamic_field_id[]" value="<?=$row->dynamic_field_id?>">
                          <input type="<?=$row->field_type?>" class="form-control" name="field_value[]" value="<?=$result2[$i]->field_value?>" <?=$req?>>
                        </div>
                     </div>
                     <? $i++; } ?>
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
  


