// document ready function
var asInitVals = new Array();
var oTable;
$(document).ready(function() { 	
	//--------------- Data tables ------------------//
	var filename = window.location.pathname.substr(window.location.pathname.lastIndexOf("/")+1);
	
	var bFilter = true;
    if($('table').hasClass('nofilter')){
        bFilter = false;
    }
    var columnSort = new Array; 
    $(this).find('thead tr th').each(function(){
        if($(this).attr('data-bSortable') == 'false') {
            columnSort.push({ "bSortable": false });
        } else {
            if($(this).html() == "Action" || $(this).html() == "Actions" || $(this).html() == "SR No" || $(this).html() == "Sr No" || $(this).html() == "Image")
        	{
            	columnSort.push({ "bSortable": false });
        	}else{
        		columnSort.push({ "bSortable": true });
        	}
        }
    });
	
	if($('table').hasClass('dynamicTable')){
		noofrecords = $(".dynamicTable").attr("noofrecords");		
		oTable = $('.dynamicTable').dataTable({
			"sPaginationType": "full_numbers",			
			"bJQueryUI": true,
			"bAutoWidth": true,
			"bLengthChange": true,
			"bProcessing": true,
			"bServerSide": true,
			"iDisplayLength":noofrecords,
			"aaSorting":[],
			"sAjaxSource": "./"+filename+"/fetch",
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
		
		$(".dataTables_search_filter input").bind("keypress", function () {
			/* Filter on the column (the index) of this element */
			oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $(".searchInput").index(this) ) );
		} );
		
	}
	
	/*
	 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
	 * the footer
	 */
	$("tfoot input").each( function (i) {
		asInitVals[i] = this.value;
	} );
	
	$("tfoot").find("input").focus( function () {
		
		if ( this.className == "search_init" )
		{
			//this.className = "";
			this.value = "";
		}
	} );
	
	$("tfoot").find("input").blur( function (i) {
		
		if ( this.value == "" )
		{
			//this.className = "search_init";
			this.value = asInitVals[$("tfoot input").index(this)];
		}
	} );
	
	$("#select_all_dynamic_table_checkbox").change(function(){
		if($(this).is(":checked")){
			$(this).closest("table").find("input:checkbox").attr("checked","checked");
		}else{
			$(this).closest("table").find("input:checkbox").removeAttr("checked");
		}
	});
	
	
});//End document ready functions

function pageReload()
{	
	/*
	 * Clear Fielters and refresh data table
	 * First it clear all the fields and call its event
	 */ 
	$('.dataTables_search_filter input').val('').keyup();
	$('.dataTables_search_filter select').prop('selectedIndex',0).change();
	if (typeof calbackfunction == 'function') { 
    	calbackfunction();
	}    
}
function pageReloadNew()
{
	
	/*
	 * Clear Fielters and refresh data table
	 * First it clear all the fields and call its event
	 */ 
	$('.dataTables_search_filter input').val('');
	$('.dataTables_search_filter select').prop('selectedIndex',0);
	/*$('.select2').select2("destroy");
	$(".select2").each(function(){
		$(this).select2({
		    placeholder: "Select"
		});
		$("#s2id_"+$(this).attr("id")).removeClass("searchInput");
	});*/
	var oSettings = oTable.fnSettings();
    for(iCol = 0; iCol < oSettings.aoPreSearchCols.length; iCol++) {
        oSettings.aoPreSearchCols[ iCol ].sSearch = '';
    }
    oTable.fnDraw();
    if (typeof calbackfunction == 'function') { 
    	calbackfunction();
	}    
}

function currentPageReload(){	
	var oSettings = oTable.fnSettings();
	if(oSettings.oFeatures.bServerSide === false){
		var before = oSettings._iDisplayStart;
		oSettings.oApi._fnReDraw(oSettings);
		//iDisplayStart has been reset to zero - so lets change it back
		oSettings._iDisplayStart = before;
		oSettings.oApi._fnCalculateEnd(oSettings);
	}	  
	//draw the 'current' page
	oSettings.oApi._fnDraw(oSettings);
}