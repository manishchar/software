  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content">
  		<div class="row">
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
        <div class="col-lg-3 col-xs-6">
        <form method="GET">
      <select class="form-control" name="table"> 
        <option>Select Table</option>
        <option value="1" <?php if($_GET['table']=='1'){echo 'selected'; } ?>>Header</option>
        <option value="2" <?php if($_GET['table']=='2'){echo 'selected'; } ?>>Form</option>
        <option value="3" <?php if($_GET['table']=='3'){echo 'selected'; } ?>>Dynamic Records</option>
      </select>
      <br/>
      <input type="submit" name="delete" class="btn btn-default" value="Delete">
      </form>
    </div>
    </div>
    </div>
    </section>
    
  </div>
  <!-- /.content-wrapper -->
  


