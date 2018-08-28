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
				            <form role="form" onsubmit="return checkImgSize()" method="post" action="<?=base_url('admin/addBranch')?>" enctype="multipart/form-data">
				            	
				             
				             <div class="form-group">
				                  <input type="hidden" name="user_login_id" value="<?=$this->session->userdata('adminId')?>">
				                </div>
                        <div class="col-md-6">
                          <div class="form-group">
                          <label for="add_name">Business Name</label>
                          <input type="text" class="form-control" id="branch_name" placeholder="Enter Bussiness Name" name="branch_name" required="">
                        </div>
                        </div>
				                <div class="col-md-6">
                           <div class="form-group">
                          <label for="add_name">Business Category</label>
                          <select class="form-control" id="bussinessCategory"  name="bussinessCategory" required="">
                            <option value="">Select</option>
                            <?php foreach ($result as $row) { ?>
                              <option value="<?=$row->category_id?>"><?=$row->category_name?></option>
                            <?php } ?>

                          </select>
                          
                        </div>
                        </div>
                        <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Contact Email</label>
                          <input type="email" class="form-control"  id="contactEmail" placeholder="Contact Email" name="contactEmail" required="">
                      </div>
                     </div>
                        <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Contact Number</label>
                          <input type="text" class="form-control" minlength="7" maxlength="11" onkeypress="return isNumberKey(event)" id="contactNumber" placeholder="Contact Number" name="contactNumber" required="">
                      </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Second Contact Number</label>
                          <input type="text" class="form-control" minlength="7" maxlength="11" onkeypress="return isNumberKey(event)" id="secondContactNumber" placeholder="Second Contact Number" name="secondContactNumber" >
                        </div>
                     </div>
                        <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Facebook Page Url</label>
                          <input type="text" class="form-control" id="fb_page_url" placeholder="Facebook Page Url" name="fb_page_url" required="">
                        </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Website Url</label>
                          <input type="text" class="form-control" id="website_url" placeholder="Website Url" name="website_url" required="">
                        </div>
                     </div>

                     <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">About Business</label>
                          <textarea class="form-control" name="about_business"></textarea>
                        </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form-group">
                          <label for="add_name">Aditional Text</label>
                          <textarea class="form-control" name="add_text"></textarea>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="col-md-3">
                       <div class="form-group">
                            <label>Open Day :</label>

                            <input type="text" class="form-control" name="openDay[]" value="MON" readonly="">
                      </div>
                     </div>
                     <div class="col-md-3">
                       <div class="form-group">
                            <label>Open Action :</label>

                            
                              <select class="form-control" name="openAction[]">
                                <option value="1">OPEN</option>
                                <option value="0">CLOSE</option>
                                
                              </select>
                                                         
                          
                            
                          </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <label>Open Time :</label>

                            <div class="input-group">
                              <input type="text" class="form-control timepicker" id="openingTime" name="openingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <label>Closing Time :</label>

                            <div class="input-group">
                              <input type="text" class="form-control timepicker" id="closingTime" name="closingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="col-md-3">
                       <div class="form-group">
                      <input type="text" class="form-control" name="openDay[]" value="TUE" readonly="">
                      </div>
                     </div>
                     <div class="col-md-3">
                       <div class="form-group">
                         <select class="form-control" name="openAction[]">
                                <option value="1">OPEN</option>
                                <option value="0">CLOSE</option>
                                
                              </select>
                 
                          </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" class="form-control timepicker" id="openingTime" name="openingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                          <div class="input-group">
                              <input type="text" class="form-control timepicker" id="closingTime" name="closingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="col-md-3">
                       <div class="form-group">
                      <input type="text" class="form-control" name="openDay[]" value="WED" readonly="">
                      </div>
                     </div>
                     <div class="col-md-3">
                       <div class="form-group">
                           

                            
                              <select class="form-control" name="openAction[]">
                                <option value="1">OPEN</option>
                                <option value="0">CLOSE</option>
                                
                              </select>
                                                         
                          
                            
                          </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                           <div class="input-group">
                              <input type="text" class="form-control timepicker" id="openingTime" name="openingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" class="form-control timepicker" id="closingTime" name="closingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="col-md-3">
                       <div class="form-group">
                            <input type="text" class="form-control" name="openDay[]" value="THU" readonly="">
                      </div>
                     </div>
                     <div class="col-md-3">
                       <div class="form-group">
                          
                              <select class="form-control" name="openAction[]">
                                <option value="1">OPEN</option>
                                <option value="0">CLOSE</option>
                                
                              </select>
                                                         
                          
                            
                          </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                           
                            <div class="input-group">
                              <input type="text" class="form-control timepicker" id="openingTime" name="openingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                           <div class="input-group">
                              <input type="text" class="form-control timepicker" id="closingTime" name="closingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="col-md-3">
                       <div class="form-group">
                           

                            <input type="text" class="form-control" name="openDay[]" value="FRI" readonly="">
                      </div>
                     </div>
                     <div class="col-md-3">
                       <div class="form-group">
                           

                            
                              <select class="form-control" name="openAction[]">
                                <option value="1">OPEN</option>
                                <option value="0">CLOSE</option>
                                
                              </select>
                                                         
                          
                            
                          </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                           

                            <div class="input-group">
                              <input type="text" class="form-control timepicker" id="openingTime" name="openingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                            

                            <div class="input-group">
                              <input type="text" class="form-control timepicker" id="closingTime" name="closingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="col-md-3">
                       <div class="form-group">
                             <input type="text" class="form-control" name="openDay[]" value="SAT" readonly="">
                      </div>
                     </div>
                     <div class="col-md-3">
                       <div class="form-group">
                               <select class="form-control" name="openAction[]">
                                <option value="1">OPEN</option>
                                <option value="0">CLOSE</option>
                                
                              </select>
                                                         
                          
                            
                          </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" class="form-control timepicker" id="openingTime" name="openingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                             <div class="input-group">
                              <input type="text" class="form-control timepicker" id="closingTime" name="closingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="col-md-3">
                       <div class="form-group">
                          <input type="text" class="form-control" name="openDay[]" value="SUN" readonly="">
                      </div>
                     </div>
                     <div class="col-md-3">
                       <div class="form-group">
                             <select class="form-control" name="openAction[]">
                                <option value="1">OPEN</option>
                                <option value="0">CLOSE</option>
                                
                              </select>
                                                         
                          
                            
                          </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                           <div class="input-group">
                              <input type="text" class="form-control timepicker" id="openingTime" name="openingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                     <div class="col-md-3">
                       
                          <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" class="form-control timepicker" id="closingTime" name="closingTime[]">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            
                          </div>
               
           
                        </div>
                     </div>
                      <div class="clearfix"></div>
                        <div class="col-md-12">
                          <div class="col-md-6">
                         <div class="form-group">
                          <label for="add_name">Bussiness Small Logo <em style="color:#FF0000">Standard Resolution >= (150 X 100 )</em></label>
                          <input type="file" class="" id="img1" name="img1" required="">
                        </div>
                       </div>
                        <div class="col-md-6" style="padding: 2px">
                         <!--  <img class="img-responsive" id="img1src" style="height: 100px;width: 150px" src="<?=base_url('resources/dist/img/')?>noimage.png">  -->

                            <div id="SmallLogo" style="background-image:url(<?=base_url('resources/')?>smallLogo.png)" class="bigBanner">
                            <div class="banner150x100">
                            <img src="" id="img1src" style="width:100%;">
                            </div>
                            </div>

                        </div>
                        </div>
                       <div class="col-md-12">
                         <div class="col-md-6">
                          <div class="form-group">
                          <label for="add_name">Bussiness Big Logo <em style="color:#FF0000">Standard Resolution  >= (300 X 200 )</em></label>
                          <input type="file" class="" id="img2"  name="img2" required="">
                        </div>
                        </div>
                        <div class="col-md-6" style="padding: 2px">
                          <!-- <img class="img-responsive" id="img2src" style="height: 200px;width: 300px" src="<?=base_url('resources/dist/img/')?>noimage.png"> -->

                            <div class="">
                        <div id="bigBanner" style="background-image:url(<?=base_url('resources/')?>bigBanner.png)" class="bigBanner">
                        <div class="banner300x100">
                        <img src="" id="img2src" style="width:100%;"/>
                        </div>
                        </div> 
                        </div>

                        </div>
                       </div>
                        <div class="col-md-12">
                          <div class="col-md-6">
                          <div class="form-group">
                          <label for="add_name">Bussiness Banner Image <em style="color:#FF0000">Standard Resolution  >= (1020 X 768 )</em></label>
                          <input type="file" class="" id="img3"  name="img3" required="">
                        </div>
                        </div>
                        
                        <div class="col-md-6" style="padding: 2px">
                          <!-- <img class="img-responsive" id="img3src" style="height: 300px;width: 300px" src="<?=base_url('resources/dist/img/')?>noimage.png"> --> 

                            <div id="businessBanner" style="background-image:url(<?=base_url('resources/')?>businessBanner1020.png)" class="bigBanner">
                        <div class="banner1020x767">
                        <img src="" id="img3src" style="width: 100%" />
                        </div>
                        </div>

                        </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                            <label>Display Address <em>Maximum 30 Charecter</em></label>
                            <input type="text" class="form-control" placeholder="Display Address" name="displayAddress" maxlength="30" required="">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                          <label for="add_campaign_date">Bussiness Address</label>
                          
  <input id="search1" class="controls form-control" type="text" placeholder="Search Box" name="branch_address" required="">
                     </div>
                    <div id="mapContainer">
                         
                    <div id="map1" class="map"></div>
                  </div>
                        </div>
				                
                  
                          <div class="col-md-12" style="padding: 0px">
                            <div class="col-md-6">
                              <div class="form-group">
                              <label>lat :</label><input type="text" class="form-control" name="lat" id="lat_01" required="" readonly="" required="">
                            </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                              <label>lng :</label><input type="text" class="form-control" name="lng" id="lng1" required="" readonly="" required="">
                            </div></div>
                          </div>
                       
				              <!-- /.box-body -->
                      <div class="clearfix"></div>
				              <div class="box-footer">
				                <button type="submit" class="btn btn-primary">Submit</button>
				              </div>
				            </form>
				        </div>
    			</div>
    			
				            
    		</div>
    	</section>

  </div>
  <script>
    $(document).ready(function(){
      $(".timepicker").timepicker({
      showInputs: false,
      defaultTime:'00:00',
      showMeridian:false
    });
    });
   var _URL = window.URL || window.webkitURL;
$("#img1").change(function(e) {
  
    var file, img;


    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
          // if(this.height>=100 && this.width>=150 )
          //   {
          //     return true;

          //   }
          //   else
          //   {
          //     alert("Image WidthXHeight should be 150X100");
          //     $("#img1").val('');
          //     return false;
          //   }
        };
        img.onerror = function() {
            alert( "not a valid file: " + file.type);
        };
        img.src = _URL.createObjectURL(file);
        $('#img1src').attr('src', img.src);

    }

});

$("#img2").change(function(e) {
    var file, img;


    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
          // if(this.height>=200 && this.width>=300 )
          //   {
          //     return true;

          //   }
          //   else
          //   {
          //     alert("Image WidthXHeight should be 300X200");
          //     $("#img2").val('');
          //     return false;
          //   }
        };
        img.onerror = function() {
            alert( "not a valid file: " + file.type);
        };
        img.src = _URL.createObjectURL(file);
        $('#img2src').attr('src', img.src);

    }

});

$("#img3").change(function(e) {
    var file, img;


    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
          // if(this.height>=300 && this.width>=300 )
          //   {
          //     return true;

          //   }
          //   else
          //   {
          //     alert("Image WidthXHeight should be 300X300");
          //      $("#img3").val('');
          //     return false;
          //   }
        };
        img.onerror = function() {
            alert( "not a valid file: " + file.type);
        };
        img.src = _URL.createObjectURL(file);

        $('#img3src').attr('src', img.src);
    }

});



      function initAutocomplete(divid) {
		 
        var map = new google.maps.Map(document.getElementById('map'+divid), {
          center: {lat: 23.2332992, lng: 77.4316238},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('search'+divid);
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();
          var latLng=searchBox.getBounds();
          if (places.length == 0) {
            return;
          }

         
          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();

          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));
            
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
           var obj1=JSON.stringify(bounds);
          var obj2=JSON.parse(obj1);
          $('#lat_0'+divid).val(obj2.south);
          $('#lng'+divid).val(obj2.west);
         // $('#lng2').val(obj2.west);
         //alert(obj2.west);
          console.log(obj2.west);
          map.fitBounds(bounds);
        });
      }

    </script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDQYEYzqmqFoeDHPUVSafFSxNnbAv98ZI&libraries=places"></script>
  <script type="text/javascript">
  		$(document).ready(function (){ 

  				initAutocomplete(1);
  		});

  	var checkImgSize=function(){
  		
  		var file_size = $('#img')[0].files[0].size;
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
  


