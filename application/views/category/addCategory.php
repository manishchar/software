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
				            <form role="form" onsubmit="" method="post" action="<?=base_url('category/addCategoryData')?>" enctype="multipart/form-data">
				            	<div class="box-body">
				             	<div class="col-md-12" style="padding-left: 0px;">
				             	<div class="col-md-6">
				             		<div class="form-group">
				                  <label for="add_name">AOI Name</label>
				                  <input type="text" class="form-control" id="category_name" placeholder="Enter Area Of Intrest Name" name="category_name[]" required="">
				                </div>
				             	</div>
				             	
				             	<div class="col-md-6">
				             		<div class="form-group">
				                  <label for="add_name">Color Code</label>
				                  <input type="text" class="form-control" id="color_code" placeholder="Enter Color Code" name="color_code[]" required="">
				                </div>
				             	</div>
				             	<div class="col-md-6">
				             		<div class="form-group">
				                  <label for="add_name">Icon</label>
				                  <input type="file" id="img1" class="form-control" id="icon" placeholder="Enter Area Of Intrest Name" name="icon[]" required="">
				                </div>
				             	</div>
				             	<div class="col-md-6" id="bgDiv" style="background: #ccffcf;height: 150px;width: 150px "> 
				             		<img class="img-responsive" id="img1src" style="height: 150px;width: 150px" src="<?=base_url('resources/dist/img/')?>noimage.png"> 
				             	</div>
				             	<!-- <div class="col-md-3" style="margin-top: 20px">
								<div class="form-group">
									<label class="col-md-3 control-label" for=""></label>
									<div class="col-md-9" >
									<input  type="button" value="Add" id="add" name="add" class="mb-sm btn btn-info" style="float:right">  
									</div>

								</div>
				             	</div> -->
								<div id="newInput" >

								</div> 
				             	</div>		             
				                
				                
				                
				                
									
				              <!-- /.box-body -->

				              <div class="box-footer">
				                <button type="submit" class="btn btn-primary">Submit</button>
				              </div>
				              </div>
				            </form>
				        </div>
    			</div>
    			
				            
    		</div>
    	</section>

  </div>
  <script type="text/javascript">

$("#color_code").change(function(e){
	$("#bgDiv").css('background',$("#color_code").val());
});

 var _URL = window.URL || window.webkitURL;
$("#img1").change(function(e) {
  
    var file, img;


    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
          if(this.height<=150 && this.width<=150 )
            {
              return true;

            }
            else
            {
              alert("Image heightXwidth should be 150X150");
              $("#img1").val('');
              return false;
            }
        };
        img.onerror = function() {
            alert( "not a valid file: " + file.type);
        };
        img.src = _URL.createObjectURL(file);
        $('#img1src').attr('src', img.src);

    }

});


  	 $(document).ready(function () {
  	 	 
		var max_fields = 1000; 
        var wrapper = $("#newInput");
        var add_button = $("#add"); 
        var x = 1;
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                var div1 = '<div class="col-md-12" style="padding-left: 0px;">';
div1 += '<a href="#" type="button" class="remove_field mb-sm btn btn-info" style="float:right; margin-top:6px;">Remove</a>';
  div1 += '<div class="col-md-3"><div class="form-group"><label for="add_name">AOI Name</label><input type="text" class="form-control" id="category_name" placeholder="Enter Area Of Intrest Name" name="category_name[]" required=""> </div> </div> <div class="col-md-3"> <div class="form-group"> <label for="add_name">Icon</label> <input type="file" class="form-control" id="icon" placeholder="Enter Area Of Intrest Name" name="icon[]" required=""> </div> </div> <div class="col-md-3"> <div class="form-group"> <label for="add_name">Color Code</label> <input type="text" class="form-control" id="color_code" placeholder="Enter Color Code" name="color_code[]" required=""> </div> </div></div>';
                $(wrapper).append(div1); //add input box

            }
        });
        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
  </script>
  
  <!-- /.content-wrapper -->
  


