<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <!-- <b>Version</b> 2.3.8 -->
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="#">Self</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark"></aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url('resources/bootstrap/js/bootstrap.min.js')?>"></script>

<script src="<?=base_url('resources/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('resources/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
<!-- <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> -->
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- <script src="<?=base_url('resources/plugins/morris/morris.min.js')?>"></script> -->
<!-- InputMask -->
<script src="<?=base_url('resources/plugins/input-mask/jquery.inputmask.js')?>"></script>
<script src="<?=base_url('resources/plugins/input-mask/jquery.inputmask.date.extensions.js')?>"></script>
<script src="<?=base_url('resources/plugins/input-mask/jquery.inputmask.extensions.js')?>"></script>
<!-- Sparkline -->
<script src="<?=base_url('resources/plugins/sparkline/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap -->
<script src="<?=base_url('resources/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?=base_url('resources/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url('resources/plugins/knob/jquery.knob.js')?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?=base_url('resources/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- datepicker -->
<script src="<?=base_url('resources/plugins/datepicker/bootstrap-datepicker.js')?>"></script>
<script src="<?=base_url('resources/plugins/timepicker/bootstrap-timepicker.min.js')?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url('resources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>

<!-- Slimscroll -->
<script src="<?=base_url('resources/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?=base_url('resources/plugins/fastclick/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('resources/dist/js/app.min.js')?>"></script>

<!-- <script src="<?=base_url('resources/plugins/datatables/datatable.js')?>"></script>
 --><!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?=base_url('resources/dist/js/pages/dashboard.js')?>"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('resources/dist/js/demo.js')?>"></script>
<script src="<?php echo base_url('resources/choosen/chosen.jquery.js')?>"></script>
<script>

function isNumberKey(evt)
       {
        //alert();
          //var charCode = (evt.which) ? evt.which : evt.keyCode;
          // if ((charCode < 48 || charCode > 57) || (charCode < 89 || charCode < 97))
          // {
          //    return false;
          // }

           var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
     {
      $(this).css('border-color','red');
      return false;
     }
      return true;
       }


var asInitVals = new Array();
var oTable;
  $(function () {
    $('#color_code').colorpicker({format:'hex'});
 //   var tt=$("#endDateId").val().split("-");
 // var today = new Date(tt[0],tt[1]-1,tt[2]);
 // alert(today);
 $('#start_date').datepicker({
      autoclose: true,
      useCurrent: false,
      format:'dd-mm-yyyy',
      startDate: '0',
    
    });

  $('#end_date').datepicker({
      autoclose: true,
      useCurrent: false,
      format:'dd-mm-yyyy',
     startDate: '0',
           
    
    });


    $('#startDate,#endDate').datepicker({
      autoclose: true,
      useCurrent: false,
      format:'dd-mm-yyyy',
      startDate: '0',
    
    });

$(".toTime").timepicker({
      showInputs: false,
      defaultTime:'00:00',
      showMeridian:false
    });

$(".fromTime").timepicker({
      showInputs: false,
      defaultTime:'00:00',
      showMeridian:false
    });
 
    // var filename = window.location.pathname.substr(window.location.pathname.lastIndexOf("/")+1);
  
  var bFilter = true;
    if($('table').hasClass('nofilter')){
        bFilter = false;
    }
    var columnSort = new Array; 
    $(this).find('thead tr th').each(function(){
        if($(this).attr('data-bSortable') == 'false') {
            columnSort.push({ "bSortable": false });
        } else {
            if($(this).html() == "Action" || $(this).html() == "Actions" || $(this).html() == "SR No" || $(this).html() == "Sr No" || $(this).html() == "Image" || $(this).html() == "#")
          {
              columnSort.push({ "bSortable": false });
          }else{
            columnSort.push({ "bSortable": true });
          }
        }
    });
   
    // $("#compnayList").DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": true,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false
    // });

   if($('#branchList').hasClass('dynamicTable')){
    noofrecords = $("#branchList").attr("noofrecords");   
    oTable = $('#branchList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('admin/branchListForSuperAdminAjax')?>",
      "fnInitComplete": function(oSettings, json) {
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
  
    $(".dataTables_search_filter input").bind("blur", function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    
    $(".dataTables_search_filter input").bind("keypress", function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
   $( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }

if($('#campaignList').hasClass('dynamicTable')){
    noofrecords = $("#campaignList").attr("noofrecords");   
    oTable = $('#campaignList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
      
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('coupon/campaignListAjax')?>",
      "fnInitComplete": function(oSettings, json) {
		 //console.log(json);
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    // $(".dataTables_search_filter select").bind("change", function()  {
    //   /* Filter on the column (the index) of this element */
    //   oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    // } );
     $(".dataTables_search_filter input").bind("blur", function () {
       /* Filter on the column (the index) of this element */
       oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
     } );
    
    $(".dataTables_search_filter input").bind("keypress", function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    $( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }

if($('#fieldList').hasClass('dynamicTable')){
    noofrecords = $("#fieldList").attr("noofrecords");   
    oTable = $('#fieldList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
      
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('admin/fieldsListAjax')?>",
      "fnInitComplete": function(oSettings, json) {
     //console.log(json);
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    // $(".dataTables_search_filter select").bind("change", function()  {
    //   /* Filter on the column (the index) of this element */
    //   oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    // } );
     $(".dataTables_search_filter input").bind("blur", function () {
       /* Filter on the column (the index) of this element */
       oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
     } );
    
    $(".dataTables_search_filter input").bind("keypress", function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    $( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }



if($('#formfieldList').hasClass('dynamicTable')){
    noofrecords = $("#formfieldList").attr("noofrecords");   
    oTable = $('#formfieldList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
      
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('admin/formfieldsListAjax')?>",
      "fnInitComplete": function(oSettings, json) {
     //console.log(json);
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    $(".dataTables_search_filter select").bind("change", function()  {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
     $(".dataTables_search_filter input").bind("blur", function () {
       /* Filter on the column (the index) of this element */
       oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
     } );
    
    $(".dataTables_search_filter input").bind("keypress", function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    $( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }

  if($('#homeScreenList').hasClass('dynamicTable')){
    noofrecords = $("#homeScreenList").attr("noofrecords");   
    oTable = $('#homeScreenList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
     
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('homeScreen/homeScreenListAjax')?>",
      "fnInitComplete": function(oSettings, json) {
     //console.log(json);
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    $(".dataTables_search_filter select").bind("change", function()  {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
     $(".dataTables_search_filter input").bind("blur", function () {
       /* Filter on the column (the index) of this element */
       oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
     } );
    
    $(".dataTables_search_filter input").bind("keypress", function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    $( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }


if($('#redeemCouponList').hasClass('dynamicTable')){
    noofrecords = $("#redeemCouponList").attr("noofrecords");   
    oTable = $('#redeemCouponList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
         
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('coupon/redeemListAjax')?>",
      "fnInitComplete": function(oSettings, json) {
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    $(".dataTables_search_filter select").bind("change", function()  {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
     $(".dataTables_search_filter input").bind("blur", function () {
       /* Filter on the column (the index) of this element */
       oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
     } );
    
    $(".dataTables_search_filter input").bind("keypress", function (e) {
      /* Filter on the column (the index) of this element */
   
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    
$( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }  



if($('#redeemRewardCardList').hasClass('dynamicTable')){
    noofrecords = $("#redeemRewardCardList").attr("noofrecords");   
    oTable = $('#redeemRewardCardList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
         
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('rewardCards/redeemRewardCardListAjax')?>",
      "fnInitComplete": function(oSettings, json) {
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    $(".dataTables_search_filter select").bind("change", function()  {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
     $(".dataTables_search_filter input").bind("blur", function () {
       /* Filter on the column (the index) of this element */
       oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
     } );
    
    $(".dataTables_search_filter input").bind("keypress", function (e) {
      /* Filter on the column (the index) of this element */
   
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    
$( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }  


if($('#viewdCouponList').hasClass('dynamicTable')){
    noofrecords = $("#viewdCouponList").attr("noofrecords");   
    oTable = $('#viewdCouponList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
         
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('coupon/viewCouponListAjax')?>",
      "fnInitComplete": function(oSettings, json) {
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    $(".dataTables_search_filter select").bind("change", function()  {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
     $(".dataTables_search_filter input").bind("blur", function () {
       /* Filter on the column (the index) of this element */
       oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
     } );
    
    $(".dataTables_search_filter input").bind("keypress", function (e) {
      /* Filter on the column (the index) of this element */
   
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    
$( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }

if($('#orderList').hasClass('dynamicTable')){
    noofrecords = $("#orderList").attr("noofrecords");   
    oTable = $('#orderList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
         
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('ordertrack/orderListAjax')?>",
      "fnInitComplete": function(oSettings, json) {
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    $(".dataTables_search_filter select").bind("change", function()  {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
     $(".dataTables_search_filter input").bind("blur", function () {
       /* Filter on the column (the index) of this element */
       oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
     } );
    
    $(".dataTables_search_filter input").bind("keypress", function (e) {
      /* Filter on the column (the index) of this element */
   
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    
$( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }


  if($('#homeScreenTrack').hasClass('dynamicTable')){
    noofrecords = $("#homeScreenTrack").attr("noofrecords");   
    oTable = $('#homeScreenTrack').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
         
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('ordertrack/homeScreenOrderTrackAjax')?>",
      "fnInitComplete": function(oSettings, json) {
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    $(".dataTables_search_filter select").bind("change", function()  {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
     $(".dataTables_search_filter input").bind("blur", function () {
       /* Filter on the column (the index) of this element */
       oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
     } );
    
    $(".dataTables_search_filter input").bind("keypress", function (e) {
      /* Filter on the column (the index) of this element */
   
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    
$( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }


if($('#remaningUbGoDollarList').hasClass('dynamicTable')){
    noofrecords = $("#remaningUbGoDollarList").attr("noofrecords");   
    oTable = $('#remaningUbGoDollarList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
         
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('ordertrack/remaningUbGoDollarListAjax')?>",
      "fnInitComplete": function(oSettings, json) {
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    $(".dataTables_search_filter select").bind("change", function()  {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
     $(".dataTables_search_filter input").bind("blur", function () {
       /* Filter on the column (the index) of this element */
       oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
     } );
    
    $(".dataTables_search_filter input").bind("keypress", function (e) {
      /* Filter on the column (the index) of this element */
   
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    
$( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }




  if($('#sharedCouponList').hasClass('dynamicTable')){
    noofrecords = $("#sharedCouponList").attr("noofrecords");   
    oTable = $('#sharedCouponList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
         
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('coupon/sharedCouponListAjax')?>",
      "fnInitComplete": function(oSettings, json) {
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    $(".dataTables_search_filter select").bind("change", function()  {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
     $(".dataTables_search_filter input").bind("blur", function () {
       /* Filter on the column (the index) of this element */
       oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
     } );
    
    $(".dataTables_search_filter input").bind("keypress", function (e) {
      /* Filter on the column (the index) of this element */
   
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    
$( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }  

if($('#UserList').hasClass('dynamicTable')){
    noofrecords = $("#UserList").attr("noofrecords");   
    oTable = $('#UserList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
         
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('admin/driverCompnayListAjax/user')?>",
      "fnInitComplete": function(oSettings, json) {
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    // $(".dataTables_search_filter select").bind("change", function()  {
    //   /* Filter on the column (the index) of this element */
    //   oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    // } );
     $(".dataTables_search_filter input").bind("blur", function () {
       /* Filter on the column (the index) of this element */
       oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
     } );
    
    $(".dataTables_search_filter input").bind("keypress", function (e) {
      /* Filter on the column (the index) of this element */
	 
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    
$( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }

  if($('#categoryList').hasClass('dynamicTable')){
    noofrecords = $("#categoryList").attr("noofrecords");   
    oTable = $('#categoryList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
         
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('category/categoryListAjax')?>",
      "fnInitComplete": function(oSettings, json) {
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    // $(".dataTables_search_filter select").bind("change", function()  {
    //   /* Filter on the column (the index) of this element */
    //   oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    // } );
    // $(".dataTables_search_filter input").bind("blur", function () {
    //   /* Filter on the column (the index) of this element */
    //   oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    // } );
    
    $(".dataTables_search_filter input").bind("keypress", function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    $( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }

  if($('#couponList').hasClass('dynamicTable')){
    noofrecords = $("#couponList").attr("noofrecords");   
    oTable = $('#couponList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
         
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('coupon/couponListAjax')?>",
      "fnInitComplete": function(oSettings, json) {
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    // $(".dataTables_search_filter select").bind("change", function()  {
    //   /* Filter on the column (the index) of this element */
    //   oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    // } );
    $(".dataTables_search_filter input").bind("blur", function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    
    $(".dataTables_search_filter input").bind("keypress", function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    $( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }



  if($('#adList1').hasClass('dynamicTable')){
    noofrecords = $("#adList1").attr("noofrecords");   
    oTable = $('#adList1').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
         
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('admin/branchListForSubAdminAjax')?>",
      "fnInitComplete": function(oSettings, json) {
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    // $(".dataTables_search_filter select").bind("change", function()  {
    //   /* Filter on the column (the index) of this element */
    //   oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    // } );
    // $(".dataTables_search_filter input").bind("blur", function () {
    //   /* Filter on the column (the index) of this element */
    //   oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    // } );
    
    $(".dataTables_search_filter input").bind("keypress", function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    $( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }

if($('#rewardCardsList').hasClass('dynamicTable')){
    noofrecords = $("#rewardCardsList").attr("noofrecords");   
    oTable = $('#rewardCardsList').dataTable({
      "sort":false,
      "sPaginationType": "full_numbers",
         
      "bJQueryUI": true,
      "bAutoWidth": true,
      "bLengthChange": true,
      "bProcessing": true,
      "bServerSide": true,
      "iDisplayLength":noofrecords,
      "aaSorting":[],
      //"sAjaxSource": "./"+filename+"/fetch",
      "sAjaxSource": "<?=base_url('rewardCards/rewardCardListAjax')?>",
      "fnInitComplete": function(oSettings, json) {
        $('#DataTables_Table_0_length').parent().remove();
        $('#DataTables_Table_0_filter').parent().parent().remove();
        },
        "aoColumnDefs": [{ "bSortable": bFilter, "aTargets": [ -1 ] }],
        "aoColumns": columnSort,
        "fnDrawCallback": function( oSettings ) {
          /* if (typeof datatablecomplete == 'function') { 
            datatablecomplete("dynamicTable");
          }  */
        } 
    });
  
    
    $(".dataTables_search_filter select").bind("change", function()  {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
     $(".dataTables_search_filter input").bind("blur", function () {
       /* Filter on the column (the index) of this element */
       oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
     } );
    
    $(".dataTables_search_filter input").bind("keypress", function (e) {
      /* Filter on the column (the index) of this element */
   
      oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
    } );
    
$( ".dataTables_search_filter input" ).bind( "keydown", function( e ) {
if(e.keyCode== 8){
oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
}
});
  }  


  });




  $("#user_DOB").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
    $("[data-mask]").inputmask();



$(function(){
  var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }

  });
var resetPage = function()
    {
      location.reload();
    }


   
    function checks()
    {
      return confirm('Are you sure to DELETE?');
    }
</script>
</body>
</html>