<?php
error_reporting(0);
function allDataList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc",$table1,$table2)
{
	$CI = &get_instance();
$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.userName"){
					$str .=" AND t2.userName LIKE '%".$value."%' ";
				}
				
				 else if($key == "deals.mobile")
				{
					$str .=" AND t2.mobile LIKE '%".$value."%' ";
				}
				 else if($key == "deals.emailId")
				{
					$str .=" AND t1.emailId LIKE '%".$value."%' ";
				}
				// else if($key == "deals.status")
				// {
				// 	$str .=" AND uda.status LIKE '%".$value."%' ";
				// }

			}
		}
		
		
	return $CI->db->query("SELECT * FROM $table1 as t1 join $table2 as t2 on t1.branchId=t2.branchId $str ORDER BY t1.userId desc LIMIT $offset,$noofrow")->result();
}

function count_rowsForCompnayDriver($condition,$table1,$table2)
{
	$CI = &get_instance();
$str ='where  1';
if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.userName"){
					$str .=" AND t2.userName LIKE '%".$value."%' ";
				}
				
				 else if($key == "deals.mobile")
				{
					$str .=" AND t2.mobile LIKE '%".$value."%' ";
				}
				 else if($key == "deals.emailId")
				{
					$str .=" AND t1.emailId LIKE '%".$value."%' ";
				}
				// else if($key == "deals.status")
				// {
				// 	$str .=" AND uda.status LIKE '%".$value."%' ";
				// }

			}
		}

	return $CI->db->query("SELECT * FROM $table1 as t1 join $table2 as t2 on t1.branchId=t2.branchId $str")->num_rows();
}

function CheckForgotUrl($id)
{	$CI = &get_instance();
	return $CI->db->query("SELECT user_email from ub_login where md5(user_email)='".$id."'")->result();
}

function assignTaskToDriverSingleData($add_id,$driver_id)
{	$CI = &get_instance();

	
	return $CI->db->query("SELECT * from ub_driver_list_against_of_add where add_id='".$add_id."' and user_login_id='".$driver_id."'")->result();
}


function pageing()
{
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		//$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
			mysql_real_escape_string( $_GET['iDisplayLength'] );
			$sLimit = "LIMIT ".$_GET['iDisplayStart'].", ".$_GET['iDisplayLength'];
	}

	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				// $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
				//  	".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
				$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
				 	".$_GET['sSortDir_'.$i].", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}

	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
		}
	}

	$sWhere = "";
	if ( $_GET['sSearch'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}


	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
	";
	$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	
	/* Data set length after filtering */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
	";
	$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultTotal = mysql_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $aRow = mysql_fetch_array( $rResult ) )
	{
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( $aColumns[$i] == "version" )
			{
				/* Special output formatting for 'version' column */
				$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
			}
			else if ( $aColumns[$i] != ' ' )
			{
				/* General output */
				$row[] = $aRow[ $aColumns[$i] ];
			}
		}
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );
	
}






